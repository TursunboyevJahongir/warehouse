<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Warehouse
 * @package App\Models
 * @property int id
 * @property int material_id
 * @property double $remainder meters or count
 * @property double price
 * @property double sum
 * @property Product product
 * @property Material material
 */
class Warehouse extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'material_id',
        'remainder',
        'price',
    ];

    public function getSumAttribute(): float|int
    {
        return $this->remainder * $this->price;
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }
}
