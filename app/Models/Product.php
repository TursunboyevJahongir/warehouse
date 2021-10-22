<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @property int id
 * @property string name
 * @property string code
 */
class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'code'
    ];

    /**
     * @return MorphMany
     */
    public function image(): MorphMany
    {
        return $this->morphMany(Resource::class, 'resource');
    }
}
