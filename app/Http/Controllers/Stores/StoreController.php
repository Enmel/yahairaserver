<?php

namespace App\Http\Controllers\Stores;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStoreRequest;
use App\Models\Store;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(StoreStoreRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $store = Store::create([
            'name' => $validated['name'],
        ]);

        return response()->json($store, Response::HTTP_OK);
    }
}
