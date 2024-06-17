<?php

namespace App\Http\Controllers\ProductTypes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DeleteController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(Request $request, ProductType $product_type) : JsonResponse
    {
        $product_type->delete();

        return response()->json([], Response::HTTP_OK);
    }
}
