<?php


use App\Http\Middleware\Validacion;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;



Route::prefix('/alumno')->controller(AlumnoController::class)->group(function () {
    Route::get('/{id}', "show")->middleware(Validacion::class);
    Route::get('', "index");
    Route::post('', "store");
    Route::delete('/{id}', "destroy")->middleware(Validacion::class);
    Route::patch('/{id}', "update")->middleware(Validacion::class);

});

