<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoPersonaController;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/test', function () {
    return Inertia::render('Test');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/solicitud', function () {
    return Inertia::render('Solicitudes');
})->middleware(['auth', 'verified'])->name('solicitud');

Route::get('/areas', function () {
    return Inertia::render('Areas');
})->middleware(['auth', 'verified'])->name('areas');

Route::get('/estatuss', function () {
    return Inertia::render('Estatus');
})->middleware(['auth', 'verified'])->name('estatuss');

Route::get('/salas', function () {
    return Inertia::render('Salas');
})->middleware(['auth', 'verified'])->name('salas');

Route::group(['middleware' => ['auth']], function () {
    Route::post('/enrolarse', [CursoPersonaController::class, 'enrolarse_curso']);
    Route::post('/rechazar_persona_curso', [CursoPersonaController::class, 'rechazar_persona_curso']);
    Route::post('/aceptar_persona_curso', [CursoPersonaController::class, 'aceptar_persona_curso']);
});

require __DIR__.'/auth.php';
require __DIR__.'/area.php';
require __DIR__.'/sala.php';
require __DIR__.'/curso.php';
require __DIR__.'/estatus.php';
require __DIR__.'/solicitud.php';
require __DIR__.'/reportes.php';
