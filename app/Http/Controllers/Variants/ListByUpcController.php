<?php

namespace App\Http\Controllers\Variants;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ListByUpcController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(Request $request, Product $product) : JsonResponse
    {

        $skus = Sku::where(['product_id' => $product->id])->with('attributeOptions.attribute')->get();

        return response()->json($skus, Response::HTTP_OK);
    }
}
