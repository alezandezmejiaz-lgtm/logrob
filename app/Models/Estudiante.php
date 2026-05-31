<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
#[Table('estudiantes')]
#[Fillable(['nombres','apellidos','cedula','correo','telefono'])]
class Estudiante extends Model
{
    
}
