<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\Brand\BrandCreateOrUpdate;
use App\Http\Livewire\Brand\BrandList;
use App\Http\Livewire\Catalog\CatalogCreateOrUpdate;
use App\Http\Livewire\Catalog\CatalogList;
use App\Http\Livewire\Collection\CollectionCreateOrUpdate;
use App\Http\Livewire\Collection\CollectionList;
use App\Http\Livewire\Group\GroupList;
use App\Http\Livewire\Option\OptionCreateOrUpdate;
use App\Http\Livewire\Option\OptionList;
use App\Http\Livewire\Post\PostCreateOrUpdate;
use App\Http\Livewire\Post\PostList;
use App\Http\Livewire\Product\ProductCreateOrUpdate;
use App\Http\Livewire\Product\ProductList;
use App\Http\Livewire\Project\ProjectCreateOrUpdate;
use App\Http\Livewire\Project\ProjectList;
use App\Http\Livewire\Setting\HomePage;
use App\Http\Livewire\Setting\SettingStore;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
Route::get('/catalog/{catalog:slug}', [CatalogController::class, 'show'])->name('catalog.show');

Route::get('/collection/{collection:slug}', [CollectionController::class, 'show'])->name('collection.show');

Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product.show');

Route::get('/contacts', ContactController::class)->name('contacts');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{post:slug}', [BlogController::class, 'post'])->name('blog.post');

Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::get('/catalog', CatalogList::class)->name('admin.catalog');
    Route::get('/catalog/create', CatalogCreateOrUpdate::class)->name('admin.catalog.create');
    Route::get('/catalog/{catalog}', CatalogCreateOrUpdate::class)->name('admin.catalog.edit');

    Route::get('/brand', BrandList::class)->name('admin.brand');
    Route::get('/brand/create', BrandCreateOrUpdate::class)->name('admin.brand.create');
    Route::get('/brand/{brand}', BrandCreateOrUpdate::class)->name('admin.brand.edit');

    Route::get('/group', GroupList::class)->name('admin.group');

    Route::get('/option', OptionList::class)->name('admin.option');
    Route::get('/option/create', OptionCreateOrUpdate::class)->name('admin.option.create');
    Route::get('/option/{option}', OptionCreateOrUpdate::class)->name('admin.option.edit');

    Route::get('/collection', CollectionList::class)->name('admin.collection');
    Route::get('/collection/create', CollectionCreateOrUpdate::class)->name('admin.collection.create');
    Route::get('/collection/{collection}', CollectionCreateOrUpdate::class)->name('admin.collection.edit');

    Route::get('/product', ProductList::class)->name('admin.product');
    Route::get('/product/create', ProductCreateOrUpdate::class)->name('admin.product.create');
    Route::get('/product/{product}', ProductCreateOrUpdate::class)->name('admin.product.edit');

    Route::get('/setting/site', SettingStore::class)->name('admin.setting.site');
    Route::get('/setting/home', HomePage::class)->name('admin.setting.home');

    /* Texts */
    Route::get('/post', PostList::class)->name('admin.post');
    Route::get('/post/create', PostCreateOrUpdate::class)->name('admin.post.create');
    Route::get('/post/{post}', PostCreateOrUpdate::class)->name('admin.post.edit');

    Route::get('/project', ProjectList::class)->name('admin.project');
    Route::get('/project/create', ProjectCreateOrUpdate::class)->name('admin.project.create');
    Route::get('/project/{project}', ProjectCreateOrUpdate::class)->name('admin.project.edit');
});
