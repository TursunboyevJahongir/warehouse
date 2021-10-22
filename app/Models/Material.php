<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Material
 * @package App\Models
 * @property int id
 * @property string name
 */
class Material extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name'
    ];
}
