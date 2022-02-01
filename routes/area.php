<?php

use App\Http\Controllers\AreaController;
use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['auth']], function () {
    Route::get('/index', [AreaController::class, 'index']);
    Route::post('/store', [AreaController::class, 'store']);
    Route::put('/update/{id}', [AreaController::class, 'update']);
    Route::delete('/destroy/{id}', [AreaController::class, 'destroy']);
//});
