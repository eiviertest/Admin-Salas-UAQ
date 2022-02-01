<?php

namespace App\Http\Controllers;

use App\Models\Estatus;
use Illuminate\Http\Request;

class EstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$request->ajax()) return redirect('/');
        $estados = Estatus::orderBy('nomEst', 'ASC')->paginate(10);
        return ['estados' => $estados];
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
        validarDatos($request);
        try {
            $estatus = new Estatus();
            $estatus->nomEstatus = $request->nomEstatus;
            $estatus->save();
            return ['mensaje' => 'Ha sido guardado el estado'];
        } catch (exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        validarDatos($request);
        try {
            $estatus = Estatus::findOrFail($request->id);
            $estatus->nomEstatus = $request->nomEstatus;
            $estatus->save();
            return ['mensaje' => 'Ha sido actualizado el estado'];
        } catch (exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function validarDatos(Request $request) {
        $request->validate([
            'nomSal' => 'required|string|text|max:200|unique:estatus',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$request->ajax()) return redirect('/');
        try {
            $estatus = Estatus::findOrFail($id);
            $estatus->delete();
            return ['mensaje' => 'Ha sido eliminado el estado'];
        } catch (exception $e) {
            return $e->getMessage();
        }
    }
}
