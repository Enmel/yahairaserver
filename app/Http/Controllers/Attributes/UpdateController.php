<?php

namespace App\Http\Controllers\Attributes;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductTypeRequest;
use App\Models\Attribute;
use App\Models\ProductType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UpdateController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(StoreProductTypeRequest $request, ProductType $product_type, Attribute $attribute) : JsonResponse
    {
        $validated = $request->validated();

        $attribute->update($validated);

        return response()->json($attribute, Response::HTTP_OK);
    }
}
