<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @property int id
 * @property string name
 * @property string code
 * @property Resource image
 */
class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'code'
    ];

    /**
     * @return MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Resource::class, 'resource');
    }

    /**
     * @return HasMany
     */
    public function materials(): HasMany
    {
        return $this->hasMany(ProductMaterial::class, 'product_id');
    }
}
