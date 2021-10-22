<?php

namespace App\Services;

use App\Models\Material;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MaterialService
{
    public function allInPagination($per_page): LengthAwarePaginator
    {
        return Material::query()->paginate($per_page);
    }
}
