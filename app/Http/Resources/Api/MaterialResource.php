<?php

namespace App\Http\Resources\Api;

use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaterialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        /**
         * @var Material $this
         */
        return [
            "id" => $this->id,
            "name" => $this->name,
        ];
    }
}
