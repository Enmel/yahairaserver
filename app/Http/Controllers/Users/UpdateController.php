<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UpdateController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(UpdateUserRequest $request, User $user) : JsonResponse
    {
        $validated = $request->validated();

        $user->update($validated);
        return response()->json($user, Response::HTTP_OK);
    }
}
