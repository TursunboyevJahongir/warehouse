<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Api\MaterialResource;
use App\Http\Resources\Api\PaginationResourceCollection;
use App\Models\Material;
use App\Services\MaterialService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MaterialController extends ApiController
{
    public function __construct(private MaterialService $service)
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
            new PaginationResourceCollection($this->service->allInPagination($per_page), MaterialResource::class));
    }

    /**
     * Display the specified resource.
     *
     * @param Material $id
     * @return JsonResponse
     */
    public function show(Material $id): JsonResponse
    {
        return $this->success(__('messages.success'), new MaterialResource($id));
    }
}
