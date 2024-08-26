<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\AttributeOptionSku;
use App\Models\Product;
use App\Models\Sku;
use App\Models\SkuStores;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(StoreProductRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $product = Product::create([
            'name' => $validated['name'],
            'brand_id' => $validated['brand_id'],
            'product_type_id' => $validated['product_type_id'],
            'upc' => $validated['upc'],
            'slug' => $validated['slug'],
        ]);

        foreach ($validated['skus'] as $sku_data) {

            $sku = Sku::create([
                'product_id' => $product->id,
                'sku' => $sku_data['sku'],
                'price' => $sku_data['price'],
            ]);

            SkuStores::create([
                'sku_id' => $sku->id,
                'store_id' => $sku_data['store_id'],
                'amount' => $sku_data['amount'],
            ]);

            foreach ($sku_data['attributes'] as $attribute) {

                AttributeOptionSku::create(
                    [
                        'sku_id' => $sku->id,
                        'attribute_option_id' => $attribute,
                    ]
                );
            }
        }

        return response()->json($product, Response::HTTP_OK);
    }
}
