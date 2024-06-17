<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
        $products = Product::with('skus.attributeOptions')->paginate(15);

        return response()->json($products, Response::HTTP_OK);
    }
}
