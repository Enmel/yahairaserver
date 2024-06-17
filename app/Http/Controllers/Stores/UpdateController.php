<?php

namespace App\Http\Controllers\Stores;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStoreRequest;
use App\Models\Store;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UpdateController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(StoreStoreRequest $request, Store $store) : JsonResponse
    {
        $validated = $request->validated();

        $store->update($validated);

        return response()->json($store, Response::HTTP_OK);
    }
}
