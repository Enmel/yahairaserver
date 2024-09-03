<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(StoreClientRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $client = Client::create([
            'nacionalidad' => $validated['nacionalidad'],
            'cedula' => $validated['cedula'],
            'primer_nombre' => $validated['primer_nombre'],
            'segundo_nombre' => $validated['segundo_nombre'],
            'primer_apellido' => $validated['primer_apellido'],
            'segundo_apellido' => $validated['segundo_apellido'],
            'fecha_nacimiento' => $validated['fecha_nacimiento'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
        ]);

        return response()->json($client, Response::HTTP_OK);
    }
}
