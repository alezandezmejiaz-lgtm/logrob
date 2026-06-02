<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;

Route::get('/estudiante',[EstudianteController::class,'getEstudiantes']); //metodo para mostrar todo
Route::get('/estudiante/{id}',[EstudianteController::class,'getEstudiante']);//metodo para buscar
Route::post('/estudiante',[EstudianteController::class,'createEstudiante']); //metodo post para crear
Route::put('/estudiante/{id}',[EstudianteController::class,'updateEstudiante']);//put para actualizar
Route::delete('/estudiante/{id}',[EstudianteController::class,'deleteEstudiante']);//eliminar
