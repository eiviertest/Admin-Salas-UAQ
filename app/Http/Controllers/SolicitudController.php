<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $solicitudes = Solicitud::select()
                        ->orderBy('nomSala', 'ASC')
                        ->join('sala as s', 'solicitud.idSal', '=', 's.idSala')
                        ->join('estatus as e', 'solicitud.idEstado', '=', 'e.idEstado')
                        ->where('e.nomEst', '!=', 'Aceptado')
                        ->persona(Auth::user()->id)
                        ->paginate(10);
        return ['salas' => $salas];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        try {
            $solicitud = new Solicitud();
            $solicitud->rutaSol = $request->nomCur;
            $solicitud->idPer = $request->fecInCur;
            $solicitud->idEst = $request->fecFinCur;
            $solicitud->save();
            return ['mensaje' => 'Ha sido guardado la solicitud'];
        } catch (exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        if(!$request->ajax()) return redirect('/');
        try {
            $solicitud = Solicitud::findOrFail($id);
            $solicitud->idEst = $request->idEst;
            $solicitud->save();
            return ['mensaje' => 'Ha sido actualizada la solicitud'];
        } catch (exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        //
    }
}
