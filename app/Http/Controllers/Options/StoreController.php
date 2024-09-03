<?php

namespace App\Http\Controllers\Options;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttributeOptionRequest;
use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\ProductType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class StoreController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(StoreAttributeOptionRequest $request, ProductType $productType, Attribute $attribute): JsonResponse
    {
        $validated = $request->validated();

        $attribute = AttributeOption::create([
            'value' => $validated['value'],
            'attribute_id' => $attribute->id,
        ]);

        return response()->json($attribute, Response::HTTP_OK);
    }
}
