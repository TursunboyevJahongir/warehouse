<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductService
{
    public function allInPagination($per_page): LengthAwarePaginator
    {
        return Product::query()->paginate($per_page);
    }
}
