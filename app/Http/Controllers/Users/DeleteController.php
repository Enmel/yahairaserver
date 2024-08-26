<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DeleteController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(Request $request, User $user) : JsonResponse
    {
        $user->delete();

        return response()->json([], Response::HTTP_OK);
    }
}
