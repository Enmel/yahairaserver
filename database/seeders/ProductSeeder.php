<?php

namespace Database\Seeders;

use App\Models\AttributeOptionSku;
use App\Models\Sku;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\SkuStores;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductType;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $brandsMapping = Brand::all();

        $productTypesMapping = ProductType::all()->first();


        foreach ($brandsMapping as $brand) {

            $name = fake()->words(2, true);

            $product = Product::create([
                'name' => $name,
                'brand_id' => $brand->id,
                'product_type_id' => $productTypesMapping->id,
                'upc' => fake()->isbn13(),
                'slug'  => Str::slug($name, '-'),
            ]);

            $productVariations = fake()->numberBetween(2, 10);

            for ($i = 0; $i <= $productVariations; $i++) {

                $sku = Sku::create([
                    'product_id' => $product->id,
                    'sku' => fake()->isbn13(),
                    'price' => fake()->randomFloat(2, 70, 150),
                ]);

                SkuStores::create([
                    'sku_id' => $sku->id,
                    'store_id' => 1,
                    'amount' => fake()->numberBetween(10, 100),
                ]);

                AttributeOptionSku::create(
                    [
                        'sku_id' => $sku->id,
                        'attribute_option_id' => fake()->numberBetween(1, 7),
                    ]
                );

                AttributeOptionSku::create(
                    [
                        'sku_id' => $sku->id,
                        'attribute_option_id' => fake()->numberBetween(8, 22),
                    ]
                );
            }

        }
    }
}
