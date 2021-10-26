<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class WarehouseService
{
    public function allInPagination($per_page): LengthAwarePaginator
    {
        return Warehouse::query()->orderBy('material_id')->paginate($per_page);
    }

    public function production($data): array
    {
        $ware = Warehouse::query()->orderBy('created_at', 'DESC')->get()->toArray();
        $basic = [];
        foreach ($data['products'] as $item) {
            $product = Product::query()->find($item['id']);
            $qty = $item['qty'];
            $array = ['product_name' => $product->name, 'product_qty' => $qty, 'product_materials' => []];
            foreach ($product->materials as $material) {
                $quantity = $material->quantity * $qty;
                while ($quantity > 0) {
                    $index = array_search($material->material_id, array_column($ware, 'material_id'));
                    if ($index === false) {
                        $array['product_materials'][] = ['warehouse_id' => null, 'material_name' => $material->material->name, 'qty' => $quantity, 'price' => null];
                        $ware[$index]['material_id'] = null;
                        break;
                    }
                    if ($ware[$index]['remainder'] - $quantity >= 0) {
                        $ware[$index]['remainder'] -= $quantity;
                        $array['product_materials'][] = ['warehouse_id' => $ware[$index]['id'], 'material_name' => $material->material->name, 'qty' => $quantity, 'price' => $ware[$index]['price']];
                        $quantity = 0;
                    } else {
                        $quantity -= $ware[$index]['remainder'];
                        $array['product_materials'][] = ['warehouse_id' => $ware[$index]['id'], 'material_name' => $material->material->name, 'qty' => $ware[$index]['remainder'], 'price' => $ware[$index]['price']];
                        //bu array_column xato bermasligi uchun unset qilinsa array_column indexlar soni yana bittaga kamayib xato xisoblab boshlaydi
                        $ware[$index]['material_id'] = null;
                    }
                }
            }
            array_push($basic, $array);
        }
        return $basic;
    }
}
