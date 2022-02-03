<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
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
        $cursos = Curso::orderBy('nomCur', 'ASC')->paginate(10);
        return ['cursos' => $cursos];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function validarDatos(Request $request) {
        $request->validate([
            'nomCur' => 'required|string|max:200|unique:sala',
            'fecInCur' => 'required|date',
            'fecFinCur' => 'required|date',
            'reqCur' => 'required|string|max:100',
            'durCur' => 'required|int|max:40',
            'estado' => 'required|bool',
            'cupCur' => 'required|int|max:1',
            'idSala' => 'required|int',
        ]);
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
            $curso = new Curso();
            $curso->nomCur = $request->nomCur;
            $curso->fecInCur = $request->fecInCur;
            $curso->fecFinCur = $request->fecFinCur;
            $curso->reqCur = $request->reqCur;
            $curso->durCur = $request->durCur;
            $curso->estado = 'true';
            $curso->cupCur = $request->cupCur;
            $curso->save();
            return ['mensaje' => 'Ha sido guardado el curso'];
        } catch (exception $e) {
            return $e->getMessage();
        }
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
