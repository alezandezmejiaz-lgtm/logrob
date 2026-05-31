<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;

Route::get('/estudiante',[EstudianteController::Class,'getEstudiantes']);
Route::get('/estudiante/{id}',[EstudianteController::Class,'getEstudiante']);
Route::post('/estudiante',[EstudianteController::Class,'createEstudiante']);
Route::put('/estudiante/{id}',[EstudianteController::Class,'updateEstudiante']);
Route::delete('/estudiante/{id}',[EstudianteController::Class,'deleteEstudiante']);
