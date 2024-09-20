<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Abbasudo\Purity\Traits\Filterable;

class SkuStores extends Model
{
    use Filterable;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sku',
        'store_id',
        'amount',
    ];

    public function storeData(): BelongsTo {
        return $this->belongsTo(Store::class, 'store_id');
    }

}
