<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        //
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
            $curso = Curso::findOrFail($request->id);
            $curso->nomCur = $request->nomCur;
            $curso->save();
            return ['mensaje' => 'Ha sido actualizado el curso'];
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
            'nomCur' => 'required|string|max:200|unique:curso',
            'fecInCur' => 'required|date',
            'fecFinCur' => 'required|date',
            'reqCur' => 'required|string|max:255',
            'durCur' => 'required|int',
            'estado' => 'required',
            'cupCur' => 'required|max:99|int',
            'idSala' => 'required|max:3|int',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(!$request->ajax()) return redirect('/');
        try {
            $curso = Curso::findOrFail($id);
            $curso->delete();
            return ['mensaje' => 'Ha sido eliminado el curso'];
        } catch (exception $e) {
            return $e->getMessage();
        }
    }
}
