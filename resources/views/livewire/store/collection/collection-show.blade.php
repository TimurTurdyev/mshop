<div>
    <nav class="py-3 text-gray-600 text-sm mb-3" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center space-x-1 md:space-x-3">
                <a href="{{ route('home') }}">
                    Главная
                </a>
            </li>
            <li class="inline-flex items-center space-x-1 md:space-x-3" aria-current="page">
                <span>/</span>
                <span class="text-gray-400">{{ $name }}</span>
            </li>
        </ol>
    </nav>

    <h1 class="text-3xl mb-10">{{ $collection->page->heading }}</h1>

    <div class="flex flex-col md:flex-row -mx-4 pb-10">
        <div class="md:flex-1 px-4">
            <div class="relative pb-10" x-data="{ activeSlide: 0, slideLength: {{ count($images) -1 }}, groupShow: '' }"
                 wire:key="images{{ now() }}">
                @foreach( $images as $image )
                    <img src="{{ $image }}" alt="" class="object-cover w-full h-96"
                         x-show="activeSlide === {{ $loop->index }}">
                @endforeach

                <div class="absolute inset-0 flex">
                    <div class="flex items-center justify-start w-1/2">
                        <button
                            class="bg-gray-600 text-white rounded-full w-12 h-12 -ml-6"
                            x-on:click="activeSlide = activeSlide === 0 ? slideLength : activeSlide - 1">
                            &#8592;
                        </button>
                    </div>
                    <div class="flex items-center justify-end w-1/2">
                        <button
                            class="bg-gray-600 text-white rounded-full w-12 h-12 -mr-6"
                            x-on:click="activeSlide = activeSlide === slideLength ? 0 : activeSlide + 1">
                            &#8594;
                        </button>
                    </div>
                </div>

                <div class="absolute w-full flex items-center justify-center px-4">
                    <template x-for="(key, index) in slideLength + 1">
                        <button
                            class="flex-1 w-4 h-2 mt-4 mx-2 mb-0 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-gray-600 hover:shadow-lg"
                            :class="{ 'bg-gray-600': activeSlide === index, 'bg-gray-100': activeSlide !== index }"
                            x-on:click="activeSlide = index"
                        ></button>
                    </template>
                </div>
            </div>
            <hr class="my-6">
            <h2 class="text-3xl mb-10" x-ref="information">Описание</h2>
            {{ $collection->page->text_html }}
            <hr class="my-6">
            <livewire:store.share.comment
                :model="$collection"
            >
            </livewire:store.share.comment>
        </div>
        <div class="md:flex-[0_0_40%] px-4" wire:key="{{ now() }}">
            <div class="sticky top-0">
                @foreach( $options as $group => $items )
                    @if( isset($steps[$group]) )
                        <div class="w-full mb-3">{{ $group }}: {{ $steps[$group] }}</div>
                    @else
                        <div class="w-full mb-3">{{ $group }}</div>
                    @endif
                    <div class="flex flex-wrap space-x-2 mb-5">
                        @foreach( $items as $price => $item )
                            <button type="button"
                                    class="border p-1 border-gray-300 @if( $item['image'] ) rounded-full @endif"
                                    wire:click="optionChange('{{ $group }}', '{{ $price }}', {{ $loop->parent->index }})"
                                    @if( $item['isSelected'] ) disabled @endif
                            >
                                @if( $item['image'] )
                                    <img src="{{ $item['image'] }}" alt="{{ $price }}"
                                         class="rounded-full object-cover w-[50px] h-[50px]">
                                @else
                                    {{ $price }}
                                @endif
                            </button>
                        @endforeach
                    </div>
                @endforeach
                <livewire:store.collection.composition-products
                    :defaultPrice="$selectPriceValue">
                </livewire:store.collection.composition-products>
                <div class="hidden lg:flex flex-col space-y-3 py-5 mt-3">
                    <a @click.prevent="$refs.information.scrollIntoView({behavior: 'smooth'})"
                       class="block text-xl cursor-pointer">Описание</a>
                    <a @click.prevent="$refs.attributes.scrollIntoView({behavior: 'smooth'})"
                       class="block text-xl cursor-pointer">Характеристики</a>
                    <a @click.prevent="$refs.reviews.scrollIntoView({behavior: 'smooth'})"
                       class="block text-xl cursor-pointer">Отзывы</a>
                    <a @click.prevent="$refs.products.scrollIntoView({behavior: 'smooth'})"
                       class="block text-xl cursor-pointer">Элементы коллекции</a>
                    <a @click.prevent="$refs.help.scrollIntoView({behavior: 'smooth'})"
                       class="block text-xl cursor-pointer">Помощь эксперта</a>
                </div>
            </div>
        </div>
    </div>
</div>
