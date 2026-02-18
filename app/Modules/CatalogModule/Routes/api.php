<?php

use App\Modules\CatalogModule\Http\Controllers\CatalogProductIndexController;
use Illuminate\Support\Facades\Route;

Route::get('products', [CatalogProductIndexController::class, 'index']);
