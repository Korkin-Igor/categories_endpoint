<?php

namespace App\Modules\CatalogModule\Http\Controllers;

use App\Modules\CatalogModule\Http\Requests\CatalogProductIndexRequest;
use App\Modules\CatalogModule\Http\Resources\CatalogProductListResource;
use App\Modules\CatalogModule\Models\CatalogProduct;
use Illuminate\Http\JsonResponse;

class CatalogProductIndexController
{
    public function index(CatalogProductIndexRequest $request): JsonResponse
    {
        $perPage = (int) $request->get('per_page', 15);
        $perPage = min(max($perPage, 1), 100);

        $products = CatalogProduct::query()
            ->when($request->has('is_active'), fn($q) => $q->where('is_active', $request->is_active))
            ->paginate($perPage);

        // 3. Возвращаем коллекцию через ресурс (он автоматически добавит мета-данные пагинации)
        return response()->json(CatalogProductListResource::collection($products)->response()->getData(true));
    }

}
