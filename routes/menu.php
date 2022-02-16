<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::group(['middleware' => ['auth']], function () {
    //RutasAdmin
    Route::get('/view_reportes', function () {
        return Inertia::render('Admin/Reportes');
    })->name('reportes');
    Route::get('/view_solicitudes', function () {
        return Inertia::render('Admin/Solicitudes');
    })->name('solicitudes');
    Route::get('/view_administrar_cursos', function () {
        return Inertia::render('Admin/VerCursos');
    })->name('administrarCursos');
    Route::get('/view_crearVariosCursos', function () {
        return Inertia::render('Admin/CrearCursos');
    })->name('crearVariosCursos');
    Route::get('/view_crearCurso', function () {
        return Inertia::render('Admin/Curso');
    })->name('crearCurso');
    //RutasUser
    Route::get('/view_mis_solicitudes', function () {
        return Inertia::render('User/VerSolicitudes');
    })->name('verSolicitudes');
    Route::get('/view_solicitar_sala', function () {
        return Inertia::render('User/SolicitarSala');
    })->name('solicitarSala');
    Route::get('/view_mostrar_cursos', function () {
        return Inertia::render('User/VerCursosUser');
    })->name('verCursos');
});