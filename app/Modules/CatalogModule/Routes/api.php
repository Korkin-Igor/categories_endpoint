<?php

use App\Modules\CatalogModule\Http\Controllers\CatalogProductIndexController;
use Illuminate\Support\Facades\Route;

Route::get('v1/catalog/products', [CatalogProductIndexController::class, 'index']);
