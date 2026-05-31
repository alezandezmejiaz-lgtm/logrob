<?php

namespace App\Schemas;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: '1.0.0',
    title: 'API de Estudiantes',
    description: 'Documentación de la API para gestionar estudiantes',
)]
#[OA\Server(
    url: 'http://localhost:8000',
    description: 'Servidor de desarrollo'
)]
class OpenApi
{
    
}