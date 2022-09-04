<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Catalog;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Catalog::factory(60)->has(Page::factory())->create();
        Brand::factory(60)->has(Page::factory())->create();
        Group::factory(50)->create();
        Option::factory(10)->has(OptionValue::factory(20))->create();
        Product::factory(10)->has(Page::factory())->has(Price::factory(5)->has(Property::factory(2)))->create();
    }
}
