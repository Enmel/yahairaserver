<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        $users = User::paginate(15);

        return response()->json($users, Response::HTTP_OK);
    }
}
