<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\URL;

/**
 * Class Resource
 * @package App\Models
 * @property string id
 * @property string additional_identifier
 * @property string name
 * @property string type
 * @property string full_url
 * @property string resource_type
 * @property string resource_id
 */
class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'additional_identifier',
        'name',
        'type',
        'full_url',
        'resource'
    ];

    protected $casts = [
        'updated_at' => 'datetime:d.m.Y H:i',
        'created_at' => 'datetime:d.m.Y H:i',
    ];

    public function getFileUrlAttribute(): string
    {
        return URL::to('/uploads/images/' . $this->attributes['name']);
    }
    /**
     * @return MorphTo
     */
    public function resource(): MorphTo
    {
        return $this->morphTo();
    }
}
