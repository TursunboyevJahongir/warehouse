<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\ApiController;
use App\Http\Requests\ProductionRequest;
use App\Http\Resources\Api\PaginationResourceCollection;
use App\Http\Resources\Api\WarehouseResource;
use App\Models\Warehouse;
use App\Services\WarehouseService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WarehouseController extends ApiController
{
    public function __construct(private WarehouseService $service)
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
            new PaginationResourceCollection($this->service->allInPagination($per_page), WarehouseResource::class));
    }

    /**
     * Display the specified resource.
     *
     * @param Warehouse $id
     * @return JsonResponse
     */
    public function show(Warehouse $id): JsonResponse
    {
        return $this->success(__('messages.success'), new WarehouseResource($id));
    }

    /**
     * Display the specified resource.
     *
     * @param ProductionRequest $request
     * @return JsonResponse
     */
    public function production(ProductionRequest $request)
    {
        $this->service->production2($request->validated());
//        return $this->success(__('messages.success'), new WarehouseResource($id));
    }
}
