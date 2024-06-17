<?php

namespace App\Http\Controllers\ProductTypes;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GetByIdController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(Request $request, ProductType $product_type) : JsonResponse
    {
        return response()->json($product_type, Response::HTTP_OK);
    }
}
