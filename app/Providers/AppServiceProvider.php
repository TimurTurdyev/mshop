<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Catalog;
use App\Models\Collection;
use App\Models\CollectionProperty;
use App\Models\Price;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::shouldBeStrict(!$this->app->isProduction());

//        Relation::enforceMorphMap([
//            'brand' => Brand::class,
//            'catalog' => Catalog::class,
//            'collection' => Collection::class,
//            'price' => Price::class,
//            'collection_property' => CollectionProperty::class,
//        ]);
    }
}
