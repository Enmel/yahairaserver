<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SkuStores extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sku_id',
        'store_id',
        'amount',
    ];

    public function storeData(): BelongsTo {
        return $this->belongsTo(Store::class, 'store_id');
    }

}
