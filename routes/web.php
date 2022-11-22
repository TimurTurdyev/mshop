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
})->name('home');

Route::get('/catalog', [\App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');
Route::get('/catalog/{catalog:slug}', [\App\Http\Controllers\CatalogController::class, 'show'])->name('catalog.show');
Route::get('/collection/{collection:slug}', [\App\Http\Controllers\CollectionController::class, 'show'])->name('collection.show');
Route::get('/product/{product:slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
Route::get('/contacts', \App\Http\Controllers\ContactController::class)->name('contacts');

Route::get('/admin', function () {
    return view('admin.dashboard');
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

Route::get('/admin/collection', \App\Http\Livewire\Collection\CollectionList::class)->name('admin.collection');
Route::get('/admin/collection/create', \App\Http\Livewire\Collection\CollectionCreateOrUpdate::class)->name('admin.collection.create');
Route::get('/admin/collection/{collection}', \App\Http\Livewire\Collection\CollectionCreateOrUpdate::class)->name('admin.collection.edit');

Route::get('/admin/product', \App\Http\Livewire\Product\ProductList::class)->name('admin.product');
Route::get('/admin/product/create', \App\Http\Livewire\Product\ProductCreateOrUpdate::class)->name('admin.product.create');
Route::get('/admin/product/{product}', \App\Http\Livewire\Product\ProductCreateOrUpdate::class)->name('admin.product.edit');

Route::get('/admin/setting/site', \App\Http\Livewire\Setting\SettingStore::class)->name('admin.setting.site');
