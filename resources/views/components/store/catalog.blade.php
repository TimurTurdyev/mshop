@props([
    'entityItems' => [],
    'show' => 'product',
])
@php
    /** @var  \App\Models\Collection|\App\Models\Product $item */
@endphp
@if( $show === 'collection' )
    @foreach( $entityItems as $item )
        <div class="text-2xl mb-3">{{ $item->name }} от {{ $item->collectionProperties->min('price') }} ₽</div>
        <div class="py-7 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach( $item->collectionProperties as $price )
                <a href="{{ route('collection.show', $item) }}?price={{ $price->id }}"
                   class="group relative">
                    <div
                        class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-50">
                        <img src="{{ $price->imageFirst() }}"
                             class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <div class="mt-3">
                        <p class="text-xs text-gray-400">{{ $item->name }}</p>
                        <h3 class="text-sm text-gray-600 mt-2">
                            {{ $price->name }}
                        </h3>
                        <p class="text-xl text-red-600">
                            <span class="text-sm mr-1 text-gray-600">от</span>{{ $price->price }} р.
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
        <hr class="my-6 py-3">
    @endforeach
@else
    <div class="py-7 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        @foreach( $entityItems as $price )
            <div class="group relative">
                <a href="{{ route('product.show', $price->slug) }}?price={{ $price->id }}">
                    <div
                        class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-50 mb-3">
                        <img src="{{ $price->imageFirst() }}"
                             class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <p class="text-xs text-gray-400">{{ $price->name }}</p>
                    @if( $price->properties->count() )
                        <h3 class="text-sm text-gray-600 mt-2 mb-2">
                            @foreach( $price->properties as $property )
                                {{ $property->optionGroup->group_site }}: {{ $property->optionValue->value }}
                            @endforeach
                        </h3>
                    @endif
                    <p class="text-xl text-red-600 pb-3">
                        {{ $price->price }} р.
                    </p>
                </a>
                <div class="grid grid-cols-2 gap-6" x-data="{ quantity : 1 }">
                    <div>
                        <div class="flex rounded-md justify-center">
                            <button @click="quantity--" type="button"
                                    class="relative inline-flex items-center space-x-2 px-4 py-2 border border-r-0 border-gray-300 text-sm font-medium rounded-l-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none">
                                -
                            </button>
                            <div class="relative flex items-stretch focus-within:z-10">
                                <input type="text" x-model="quantity" name="quantity" id="quantity"
                                       class="text-center block w-full rounded-none sm:text-sm border border-l-0 border-r-0 border-gray-300 focus:outline-none"
                                       value="0">
                            </div>
                            <button @click="quantity++" type="button"
                                    class="relative inline-flex items-center space-x-2 px-4 py-2 border border-l-0 border-gray-300 text-sm font-medium rounded-r-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none">
                                +
                            </button>
                        </div>
                    </div>
                    <div>
                        <button type="button"
                                x-on:click="$wire.emit('addProduct', @js( $price->priceToArray(['id', 'name', 'price']) ), quantity)"
                                class="w-full rounded-md border border-transparent bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none">
                            Добавить
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
