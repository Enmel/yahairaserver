<?php

namespace App\Http\Controllers\Variants;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GetByIdController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(Request $request, Product $product, Sku $sku) : JsonResponse
    {
        $sku = Sku::with('attributeOptions.attribute')->find($sku->id);

        return response()->json($sku, Response::HTTP_OK);
    }
}
