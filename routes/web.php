<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/catalog', \App\Http\Livewire\Catalog\CatalogList::class)->name('admin.catalog');
Route::get('/admin/catalog/create', \App\Http\Livewire\Catalog\CatalogCreateOrUpdate::class)->name('admin.catalog.create');
Route::get('/admin/catalog/{catalog}', \App\Http\Livewire\Catalog\CatalogCreateOrUpdate::class)->name('admin.catalog.edit');

Route::get('/admin/brand', \App\Http\Livewire\Brand\BrandList::class)->name('admin.brand');
Route::get('/admin/brand/create', \App\Http\Livewire\Brand\BrandCreateOrUpdate::class)->name('admin.brand.create');
Route::get('/admin/brand/{brand}', \App\Http\Livewire\Brand\BrandCreateOrUpdate::class)->name('admin.brand.edit');

Route::get('/admin/group', \App\Http\Livewire\Group\GroupList::class)->name('admin.group');

Route::get('/admin/option', \App\Http\Livewire\Option\OptionList::class)->name('admin.option');
Route::get('/admin/option/create', \App\Http\Livewire\Option\OptionCreateOrUpdate::class)->name('admin.option.create');
Route::get('/admin/option/{option}', \App\Http\Livewire\Option\OptionCreateOrUpdate::class)->name('admin.option.edit');

Route::get('/admin/product', \App\Http\Livewire\Product\ProductList::class)->name('admin.product');
Route::get('/admin/product/create', \App\Http\Livewire\Product\ProductCreateOrUpdate::class)->name('admin.product.create');
Route::get('/admin/product/{product}', \App\Http\Livewire\Product\ProductCreateOrUpdate::class)->name('admin.product.edit');
