<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\ProductType;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = [
            [
                'name' => 'Color',
                'values' => ['Amarillo', 'Azul', 'Verde', 'Negro', 'Blanco', 'Rojo'],
            ],
            [
                'name' => 'Size',
                'values' => [30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45,],
            ],
        ];

        foreach ($attributes as $attribute) {

            $createdAttribute = Attribute::create(['name' => $attribute['name'], 'product_type_id' => 1]);
            foreach ($attribute['values'] as $value) {
                $createdAttribute->attributeOptions()->create(['value' => $value]);
            }

        }
    }
}
