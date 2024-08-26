<?php

namespace App\Http\Controllers\Attributes;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductTypeRequest;
use App\Models\Attribute;
use App\Models\ProductType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(StoreProductTypeRequest $request, ProductType $productType): JsonResponse
    {
        $validated = $request->validated();

        $attribute = Attribute::create([
            'name' => $validated['name'],
            'product_type_id' => $productType->id,
        ]);

        return response()->json($attribute, Response::HTTP_OK);
    }
}
