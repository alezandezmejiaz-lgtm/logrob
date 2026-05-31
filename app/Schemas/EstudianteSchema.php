<?php

namespace App\Schemas;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'Estudiante',
    type: 'object',
    properties: [
        new OA\Property(property: 'id', type: 'integer', example: 1),
        new OA\Property(property: 'nombres', type: 'string', example: 'Juan'),
        new OA\Property(property: 'apellidos', type: 'string', example: 'Pérez'),
        new OA\Property(property: 'cedula', type: 'string', example: '1234567890'),
        new OA\Property(property: 'correo', type: 'string', format: 'email', example: 'juan@email.com'),
        new OA\Property(property: 'telefono', type: 'string', example: '555-1234'),
        new OA\Property(property: 'created_at', type: 'string', format: 'date-time'),
        new OA\Property(property: 'updated_at', type: 'string', format: 'date-time'),
    ]
)]
#[OA\Schema(
    schema: 'EstudianteInput',
    type: 'object',
    required: ['nombres', 'apellidos', 'cedula', 'correo', 'telefono'],
    properties: [
        new OA\Property(property: 'nombres', type: 'string', example: 'Juan'),
        new OA\Property(property: 'apellidos', type: 'string', example: 'Pérez'),
        new OA\Property(property: 'cedula', type: 'string', example: '1234567890'),
        new OA\Property(property: 'correo', type: 'string', format: 'email', example: 'juan@email.com'),
        new OA\Property(property: 'telefono', type: 'string', example: '555-1234'),
    ]
)]
class EstudianteSchema
{
    
}