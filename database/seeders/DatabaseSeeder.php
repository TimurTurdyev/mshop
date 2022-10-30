<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Catalog;
use App\Models\Collection;
use App\Models\Group;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Page;
use App\Models\Price;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Catalog::factory(60)->has(Page::factory())->create();
        Brand::factory(60)->has(Page::factory())->create();
        Group::factory(50)->create();
        Option::factory(10)->has(OptionValue::factory(20))->create();
        Collection::factory(20)->has(
            Product::factory(10)
                ->has(Page::factory())
                ->has(
                    Price::factory(5)
                        ->has(Property::factory(2))
                )
        )->has(Page::factory())->create();
    }
}
