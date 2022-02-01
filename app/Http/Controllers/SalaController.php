<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $salas = Sala::orderBy('nomSala', 'ASC')->paginate(10);
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
        validarDatos($request);
        try {
            $sala = new Sala();
            $sala->nomSala = $request->nomSala;
            $sala->save();
            return ['mensaje' => 'Ha sido guardada la sala'];
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
            'nomSala' => 'required|string|text|max:200|unique:sala',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        validarDatos($request);
        try {
            $sala = Sala::findOrFail($request->id);
            $sala->nomSala = $request->nomSala;
            $sala->save();
            return ['mensaje' => 'Ha sido actualizada la sala'];
        } catch (exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$request->ajax()) return redirect('/');
        try {
            $sala = Sala::findOrFail($id);
            $sala->delete();
            return ['mensaje' => 'Ha sido eliminada la sala'];
        } catch (exception $e) {
            return $e->getMessage();
        }
    }
}
