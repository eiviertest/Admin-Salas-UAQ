<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\CursoPersona;
use App\Models\Curso;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;

class CursoPersonaController extends Controller
{   
    /**
     * Descargar los cursos por semestre
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function cursos_impartidos(Request $request){
        //if(!$request->ajax()) return redirect('/');
        $fecha_actual = Carbon::now()->format('m-d');
        $semestre = "";
        $total_cursos = 0;
        if($fecha_actual < '07-01') { 
            //Primer semestre
            $semestre = "Primer semestre";
            $inicio_anio = "01-01";
            $medio_anio = "06-30";
            $cursos = $this->cursos_impartidos_fecha($inicio_anio, $medio_anio);
        }else{
            //Segundo semestre
            $semestre = "Segundo semestre";
            $medio_anio = "07-01";
            $fin_anio = "12-31";
            $cursos = $this->cursos_impartidos_fecha($medio_anio, $fin_anio);
        }
        $pdf = PDF::loadView('reportes.cursos_impartidos', $cursos, $semestre);
        return $pdf->download('cursos_impartidos.pdf');
    }

    /**
     * Descargar los cursos por semestre
     *
     * @param date fecha_inicio fecha_fin
     * @return array Cursos
     */
    public function cursos_impartidos_fecha($fecha_inicio, $fecha_fin){
        $cursos = Curso::select('curso.nomCur', 'curso.fecInCur', 'curso.fecFinCur', 'cupCur', 's.nomSala')
                        ->join('sala as s', 's.idSala', '=', 'curso.idSala')
                        ->whereRaw('DATE_FORMAT(curso.fecInCur, "%m-%d") >= ? and DATE_FORMAT(curso.fecFinCur, "%m-%d") <= ?', [$fecha_inicio, $fecha_fin])
                        ->get();
        return $cursos;
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
        $pdf = PDF::loadView('reportes.concentrado_curso', $personas, $sala_curso);
        return $pdf->download('concentrado_curso.pdf');
    }
}
