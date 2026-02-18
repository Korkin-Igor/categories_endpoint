<?php

namespace App\Modules\CatalogModule\Tests\Feature;

use App\Modules\CatalogModule\Models\CatalogProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogProductIndexTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_can_list_catalog_products_with_pagination(): void
    {
        for ($i = 1; $i <= 3; $i++) {
            CatalogProduct::create([
                'name' => "Product $i",
                'price' => 1000.50 + $i,
                'is_active' => true,
            ]);
        }

        $response = $this->getJson('/api/catalog-products?per_page=3');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'price',
                    'price_formatted',
                ]
            ],
            'links' => ['first', 'last', 'prev', 'next'],
            'meta' => [
                'current_page',
                'last_page',
                'per_page',
                'total'
            ]
        ]);

        $response->assertJsonCount(3, 'data');
    }
}
