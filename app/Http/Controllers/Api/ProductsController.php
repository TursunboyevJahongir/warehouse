<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Api\PaginationResourceCollection;
use App\Http\Resources\Api\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductsController extends ApiController
{
    public function __construct(private ProductService $service)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function all(Request $request): JsonResponse
    {
        $per_page = $request->per_page ?? config('app.per_page');
        return $this->success(__('messages.success'),
            new PaginationResourceCollection($this->service->allInPagination($per_page), ProductResource::class));
    }

    /**
     * Display the specified resource.
     *
     * @param Product $id
     * @return JsonResponse
     */
    public function show(Product $id): JsonResponse
    {
        return $this->success(__('messages.success'), new ProductResource($id));
    }
}
