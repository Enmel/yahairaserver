<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UpdateController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(UpdateClientRequest $request, Client $client) : JsonResponse
    {
        $validated = $request->validated();

        $client->update($validated);

        return response()->json($client, Response::HTTP_OK);
    }
}
