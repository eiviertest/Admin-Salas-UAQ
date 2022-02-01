<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //if(!$request->ajax()) return redirect('/');
        $areas = Area::orderBy('nomArea', 'ASC')->paginate(10);
        return ['areas' => $areas];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if(!$request->ajax()) return redirect('/');
        validarDatos($request);
        try {
            $area = new Area();
            $area->nomArea = $request->nomArea;
            $area->save();
            return ['mensaje' => 'Ha sido guardada el área'];
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
    public function update(Request $request)
    {
        //if(!$request->ajax()) return redirect('/');
        validarDatos($request);
        try {
            $area = Area::findOrFail($request->id);
            $area->nomArea = $request->nomArea;
            $area->save();
            return ['mensaje' => 'Ha sido actualizada el área'];
        } catch (exception $e) {
            return $e->getMessage();
        }
    }

    public function validarDatos(Request $request) {
        $request->validate([
            'nomArea' => 'required|string|text|max:200|unique:area',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //if(!$request->ajax()) return redirect('/');
        try {
            $area = Area::findOrFail($id);
            $area->delete();
            return ['mensaje' => 'Ha sido eliminada el área'];
        } catch (exception $e) {
            return $e->getMessage();
        }
    }
}
