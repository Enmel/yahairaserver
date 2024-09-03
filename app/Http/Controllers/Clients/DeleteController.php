<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DeleteController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(Request $request, Client $client) : JsonResponse
    {
        $client->delete();

        return response()->json([], Response::HTTP_OK);
    }
}
