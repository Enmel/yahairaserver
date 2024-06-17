<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UpdateController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(StoreProductRequest $request, Product $product) : JsonResponse
    {
        $validated = $request->validated();

        $product->update($validated);
        
        return response()->json($product, Response::HTTP_OK);
    }
}
