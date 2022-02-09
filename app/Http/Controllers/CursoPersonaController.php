<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\CursoPersona;
use App\Models\Curso;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CursoPersonaController extends Controller
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
     * Descargar los cursos por semestre
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function cursos_impartidos(Request $request){
        if(!$request->ajax()) return redirect('/');
        $fecha_actual = Carbon::now()->format('m-d');
        if($fecha_actual < '07-01') { 
            //Primer semestre
        }else{
            //Segundo semestre
        }
    }

    /**
     * Descargar las personas por curso
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function concentrado_curso(Request $request){
        if(!$request->ajax()) return redirect('/');
        $personas = CursoPersona::select('c.nomCur', 'c.fecInCur', 'c.fecFinCur', DB::raw('CONCAT(p.nomPer, " ", p.apeMatPer, " ", p.apePatPer) as nombre'), 'a.nomArea')
                    ->join('curso as c', 'curso_persona.idCur', '=', 'c.idCur')
                    ->join('persona as p', 'curso_persona.idPer', '=', 'p.idPer')
                    ->join('area as a', 'a.idArea', '=', 'p.idArea')
                    ->where('curso_persona.idCur', '=', $request->idCur)
                    ->get();
        $sala_curso = Curso::select('nomSala')
                            ->join('sala as s', 's.idSala', '=', 'curso.idSala')
                            ->where('idCur', '=', $request->idCur)
                            ->first();
        return $sala_curso;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CursoPersona  $cursoPersona
     * @return \Illuminate\Http\Response
     */
    public function show(CursoPersona $cursoPersona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CursoPersona  $cursoPersona
     * @return \Illuminate\Http\Response
     */
    public function edit(CursoPersona $cursoPersona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CursoPersona  $cursoPersona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CursoPersona $cursoPersona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CursoPersona  $cursoPersona
     * @return \Illuminate\Http\Response
     */
    public function destroy(CursoPersona $cursoPersona)
    {
        //
    }
}
