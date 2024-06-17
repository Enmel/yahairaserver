<?php

namespace App\Http\Controllers\ProductTypes;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductTypeRequest;
use App\Models\ProductType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UpdateController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(StoreProductTypeRequest $request, ProductType $product_type) : JsonResponse
    {
        $validated = $request->validated();

        $product_type->update($validated);

        return response()->json($product_type, Response::HTTP_OK);
    }
}
