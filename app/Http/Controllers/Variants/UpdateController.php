<?php

namespace App\Http\Controllers\Variants;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVariantRequest;
use App\Models\Sku;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\AttributeOptionSku;
use App\Models\Product;
class UpdateController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(StoreVariantRequest $request, Product $product, Sku $sku): JsonResponse
    {
        $validated = $request->validated();

        $sku->update([
            'sku' => $validated['sku'],
            'price' => $validated['price'],
            'amount' => $validated['amount'],
        ]);

        AttributeOptionSku::where('sku_id', $sku->id)->delete();

        $variants = [];

        foreach ($validated as $variant) {
            $variants[] = AttributeOptionSku::create([
                'sku_id' => $sku->id,
                'attribute_option_id' => $variant['attribute_option_id'],
            ]);
        }

        $sku = $sku->toArray();
        $sku['variants'] = $variants;

        return response()->json($sku, Response::HTTP_OK);
    }
}
