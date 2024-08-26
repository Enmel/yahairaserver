<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sku extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'sku',
        'price'
    ];

    protected function price(): Attribute {
        return Attribute::make(
            get: static fn($value) => $value / 100,
            set: static fn($value) => $value * 100,
        );
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function attributeOptions(): BelongsToMany {
        return $this->belongsToMany(AttributeOption::class, 'attribute_option_skus');
    }

    public function availableInStores(): HasMany {
        return $this->hasMany(SkuStores::class, 'sku_id');
    }
}
