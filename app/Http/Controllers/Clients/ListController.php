<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ListController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(Request $request) : JsonResponse
    {
        $clients = Client::paginate(15);

        return response()->json($clients, Response::HTTP_OK);
    }
}
