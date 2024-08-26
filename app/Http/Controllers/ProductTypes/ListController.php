<?php

namespace App\Http\Controllers\ProductTypes;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
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
        $product_types = ProductType::all();

        return response()->json($product_types, Response::HTTP_OK);
    }
}
