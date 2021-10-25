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

    public function production($data)
    {
        foreach ($data['products'] as $item) {
            $product = Product::query()->find($item['id']);
            $qty = $item['qty'];
            foreach ($product->materials as $material) {

//                dd();
                $ware = Warehouse::query()->where('material_id', $material->id)->orderBy('created_at', 'DESC')->get();
                dd($ware);
                foreach ($ware as $item) {
                    if ($ware->first()->remainder >= $material->quantity * $qty) {

                        break;
                    } else {

                    }
                }
            }
        }
//        return Warehouse::query()->orderBy('material_id')->;
    }


    public function production2($data)
    {
        $ware = Warehouse::query()->orderBy('created_at', 'DESC')->get()->toArray();
        $array = [];
        foreach ($data['products'] as $item) {
            $product = Product::query()->find($item['id']);
            $qty = $item['qty'];
            foreach ($product->materials as $material) {
                $quantity = $material->quantity * $qty;
                while ($quantity >= 0) {
//                    $product_material = $ware[array_search(3145, array_column($ware, 'material_id'))];
                    $product_material = $ware[array_search($material->material_id, array_column($ware, 'material_id'))];
                    dd($product_material);
                    dd($product_material);
                    if ($product_material['remainder'] - $quantity >= 0) {
                        $product_material['remainder'] -= $quantity;
                        $array += [['product_name' => $product->id], ['product_qty' => $qty], ['material_id' => $material->id], ['qty' => $material->quantity * $qty]];
                    } else {
                        $quantity -= $product_material['remainder'];
                        unset($product_material);
                    }
                }


            }
        }

//        return Warehouse::query()->orderBy('material_id')->;
    }
}
