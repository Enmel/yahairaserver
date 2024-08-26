<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GetByIdController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(Request $request, User $user) : JsonResponse
    {
        return response()->json($user, Response::HTTP_OK);
    }
}
