<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;

Route::get('/estudiante',[EstudianteController::class,'getEstudiantes']);
Route::get('/estudiante/{id}',[EstudianteController::class,'getEstudiante']);
Route::post('/estudiante',[EstudianteController::class,'createEstudiante']);
Route::put('/estudiante/{id}',[EstudianteController::class,'updateEstudiante']);
Route::delete('/estudiante/{id}',[EstudianteController::class,'deleteEstudiante']);
