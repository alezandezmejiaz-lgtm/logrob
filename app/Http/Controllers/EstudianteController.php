<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class EstudianteController extends Controller
{
    // GET /api/estudiante
    
    #[OA\Get(
        path: '/api/estudiante',
        summary: 'Obtener todos los estudiantes',
        tags: ['Estudiantes'],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Lista de estudiantes',
                content: new OA\JsonContent(
                    type: 'array',
                    items: new OA\Items(ref: '#/components/schemas/Estudiante')
                )
            )
        ]
    )]
    public function getEstudiantes()
    {
        $estudiante = Estudiante::all();
        return response()->json($estudiante);
    }

    // GET /api/estudiante/{id}
    
    #[OA\Get(
        path: '/api/estudiante/{id}',
        summary: 'Obtener un estudiante por ID',
        tags: ['Estudiantes'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer')
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Estudiante encontrado',
                content: new OA\JsonContent(ref: '#/components/schemas/Estudiante')
            ),
            new OA\Response(
                response: 404,
                description: 'Estudiante no encontrado',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'message', type: 'string', example: 'Estudiante no encontrada')
                    ]
                )
            )
        ]
    )]
    public function getEstudiante($id)
    {
        $estudiante = Estudiante::find($id);
        if ($estudiante) {
            return response()->json([$estudiante], 200);
        } else {
            return response()->json(['message' => 'Estudiante no encontrada'], 404);
        }
    }


    // POST /api/estudiante

    #[OA\Post(
        path: '/api/estudiante',
        summary: 'Crear un nuevo estudiante',
        tags: ['Estudiantes'],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(ref: '#/components/schemas/EstudianteInput')
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: 'Estudiante creado exitosamente',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'message', type: 'string', example: 'Estudiante creada exitosamente'),
                        new OA\Property(property: 'musica', ref: '#/components/schemas/Estudiante')
                    ]
                )
            ),
            new OA\Response(
                response: 422,
                description: 'Datos inválidos'
            )
        ]
    )]
    public function createEstudiante(Request $request)
    {
        $estudiante = new Estudiante();
        $estudiante->nombres = $request->nombres;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->cedula = $request->cedula;
        $estudiante->correo = $request->correo;
        $estudiante->telefono = $request->telefono;
        $estudiante->save();

        return response()->json([
            'message' => 'Estudiante creada exitosamente',
            'Estudiante' => $estudiante
        ], 200);
    }

    
    // PUT /api/estudiante/{id}

    #[OA\Put(
        path: '/api/estudiante/{id}',
        summary: 'Actualizar un estudiante existente',
        tags: ['Estudiantes'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer')
            )
        ],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(ref: '#/components/schemas/EstudianteInput')
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: 'Estudiante actualizado',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'message', type: 'string', example: 'Estudiante actualizado'),
                        new OA\Property(property: 'Estudiante', ref: '#/components/schemas/Estudiante')
                    ]
                )
            ),
            new OA\Response(
                response: 404,
                description: 'Estudiante no encontrado',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'message', type: 'string', example: 'Estudiante no encontrado')
                    ]
                )
            )
        ]
    )]
    public function updateEstudiante($id, Request $request)
    {
        $estudiante = Estudiante::find($id);
        if ($estudiante) {
            $estudiante->nombres = $request->nombres;
            $estudiante->apellidos = $request->apellidos;
            $estudiante->cedula = $request->cedula;
            $estudiante->correo = $request->correo;
            $estudiante->telefono = $request->telefono;
            $estudiante->save();

            return response()->json([
                'message' => 'Estudiante actualizado',
                'Estudiante' => $estudiante
            ], 200);
        } else {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }
    }

    // DELETE /api/estudiante/{id}

    #[OA\Delete(
        path: '/api/estudiante/{id}',
        summary: 'Eliminar un estudiante',
        tags: ['Estudiantes'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer')
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Estudiante eliminado exitosamente',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'message', type: 'string', example: 'Estudiante eliminada exitosamente')
                    ]
                )
            ),
            new OA\Response(
                response: 404,
                description: 'Estudiante no encontrada',
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: 'message', type: 'string', example: 'Estudiante no encontrada')
                    ]
                )
            )
        ]
    )]
    public function deleteEstudiante($id)
    {
        $estudiante = Estudiante::find($id);
        if ($estudiante) {
            $estudiante->delete();
            return response()->json(['message' => 'Estudiante eliminada exitosamente'], 200);
        } else {
            return response()->json(['message' => 'Estudiante no encontrada'], 404);
        }
    }
}