<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Catalog;
use App\Models\Collection;
use App\Models\CollectionProperty;
use App\Models\Group;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Page;
use App\Models\Price;
use App\Models\Product;
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

        $option = Option::factory()->create([
            'group_admin' => 'Admin color',
            'group_site' => 'Color',
        ]);

        $optionValues = OptionValue::factory(5)
            ->create()
            ->map(fn(OptionValue $optionValue) => $optionValue->id)
            ->toArray();

        $option->optionValues()->sync($optionValues);

        Collection::factory(10)
            ->has(Page::factory())
            ->create()
            ->map(function (Collection $collection) use ($option) {
                $properties_unique = Product::factory(fake()->numberBetween(2, 20))
                    ->has(Page::factory())
                    ->has(Price::factory(5))
                    ->create()
                    ->map(function (Product $product) use ($collection, $option) {

                        $product->update([
                            'collection_id' => $collection->id
                        ]);

                        $index = 0;
                        return $product->prices->map(function (Price $price) use ($option, &$index) {
                            /** @var OptionValue $value1 */
                            $value1 = $option->optionValues[$index];
                            $index++;


                            $values = [
                                [
                                    'option_id' => $option->id,
                                    'option_value_id' => $value1->id,
                                ],
                            ];

                            $keys = [];

                            foreach ($values as $v) {
                                $property = $price->properties()->updateOrCreate($v);
                                $keys[] = sprintf('%d.%d', $property->option_id, $property->option_value_id);
                            }

                            return implode('_', $keys);
                        });
                    })
                    ->flatten()
                    ->unique();

                foreach ($properties_unique as $index => $property) {
                    /** @var CollectionProperty $collectionProperty */
                    $collectionProperty = CollectionProperty::factory()->create([
                        'collection_id' => $collection->id
                    ]);

                    str($property)
                        ->explode('_')
                        ->map(function ($item) use ($collectionProperty) {

                            [$option_id, $option_value_id] = str($item)->explode('.')->toArray();

                            $collectionProperty->properties()->create([
                                'option_id' => $option_id,
                                'option_value_id' => $option_value_id,
                            ]);
                        });
                }
            });
    }
}
