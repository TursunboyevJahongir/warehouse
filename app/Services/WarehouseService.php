<?php

namespace App\Services;

use App\Models\Warehouse;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class WarehouseService
{
    public function allInPagination($per_page): LengthAwarePaginator
    {
        return Warehouse::query()->orderBy('material_id')->paginate($per_page);
    }
}
