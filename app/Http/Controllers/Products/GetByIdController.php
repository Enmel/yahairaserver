<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GetByIdController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(Request $request, Product $product) : JsonResponse
    {
        $product = Product::with('skus.attributeOptions.attribute')->find($product->id);

        return response()->json($product, Response::HTTP_OK);
    }
}
