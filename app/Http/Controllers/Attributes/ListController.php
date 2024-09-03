<?php

namespace App\Http\Controllers\Attributes;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use App\Models\Attribute;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ListController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(Request $request, ProductType $productType) : JsonResponse
    {
        $attributes = Attribute::where(['product_type_id' => $productType->id])->with('attributeOptions')->get();

        return response()->json($attributes, Response::HTTP_OK);
    }
}
