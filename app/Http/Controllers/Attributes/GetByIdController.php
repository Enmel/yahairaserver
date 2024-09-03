<?php

namespace App\Http\Controllers\Attributes;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\ProductType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GetByIdController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(Request $request, ProductType $product_type, Attribute $attribute) : JsonResponse
    {
        $attributes = Attribute::where(['id' => $attribute->id])->with('attributeOptions')->get();
        return response()->json($attributes, Response::HTTP_OK);
    }
}
