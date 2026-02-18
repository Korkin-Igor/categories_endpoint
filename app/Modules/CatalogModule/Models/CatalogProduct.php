<?php

namespace App\Modules\CatalogModule\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogProduct extends Model
{
    protected $fillable = ['name', 'price', 'is_active'];

    protected $table = 'catalog_products';
}
