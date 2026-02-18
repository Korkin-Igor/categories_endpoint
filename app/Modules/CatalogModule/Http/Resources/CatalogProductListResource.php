<?php

namespace App\Modules\CatalogModule\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Number;

class CatalogProductListResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => number_format($this->price, 2, '.', ' ') . ' ₽',
            'created_at' => $this->created_at,
        ];
    }
}
