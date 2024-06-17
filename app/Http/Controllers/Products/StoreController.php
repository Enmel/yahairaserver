<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(StoreProductRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $product = Product::create([
            'name' => $validated['name'],
            'brand_id' => $validated['brand_id'],
            'product_type_id' => 1,
            'upc' => $validated['upc'],
            'slug' => $validated['slug'],
        ]);

        return response()->json($product, Response::HTTP_OK);
    }
}
