<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @property int id
 * @property int product_id
 * @property int material_id
 * @property double $quantity meters or count
 * @property string code
 */
class ProductMaterial extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'material_id',
        'quantity',
    ];

    public function setCountAttribute($value)
    {
        $this->count = $value;
    }

    public static function productsMaterialsIds($ids): array
    {
        /**
         * product material idlarni bitta to'plam qilib qaytaradi.
         */
        return array_unique(self::query()->whereIn('product_id', $ids)->pluck('material_id')->toArray());
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }
}
