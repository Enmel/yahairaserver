<?php

namespace App\Http\Controllers\Variants;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVariantRequest;
use App\Models\Sku;
use App\Models\AttributeOptionSku;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class StoreController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(StoreVariantRequest $request, Product $product): JsonResponse
    {
        $validated = $request->validated();

        $sku = Sku::create([
            'sku' => $validated['sku'],
            'price' => $validated['price'],
            'amount' => $validated['amount'],
        ]);

        foreach ($validated as $variant) {
            AttributeOptionSku::create([
                'sku_id' => $sku->id,
                'attribute_option_id' => $variant['attribute_option_id'],
            ]);
        }

        return response()->json($product, Response::HTTP_OK);
    }
}
