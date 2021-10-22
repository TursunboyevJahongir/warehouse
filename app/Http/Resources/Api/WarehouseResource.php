<?php

namespace App\Http\Resources\Api;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WarehouseResource extends JsonResource
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
         * @var Warehouse $this
         */
        return [
            "id" => $this->id,
            "material" => $this->material->name,
            "remainder" => $this->remainder,
            "date" => $this->created_at->format('d.m.Y'),
        ];
    }
}
