<div class="group relative" x-data="{ quantity: 1 }">
    <a href="{{ route('collection.show', $model) }}">
        <div class="relative pb-10" x-data="{ activeSlide: 0, slideLength: {{ count($images) -1 }}, groupShow: '' }"
             wire:key="images{{ now() }}">
            @foreach( $images as $image )
                <img src="{{ $image }}" alt="" class="object-cover w-full h-96"
                     x-show="activeSlide === {{ $loop->index }}">
            @endforeach

            <div class="absolute inset-0 flex">
                <div class="flex items-center justify-start w-1/2">
                    <button
                        class="bg-gray-600 text-white rounded-full w-8 h-8 -ml-2"
                        x-on:click.prevent="activeSlide = activeSlide === 0 ? slideLength : activeSlide - 1">
                        &#8592;
                    </button>
                </div>
                <div class="flex items-center justify-end w-1/2">
                    <button
                        class="bg-gray-600 text-white rounded-full w-8 h-8 -mr-2"
                        x-on:click.prevent="activeSlide = activeSlide === slideLength ? 0 : activeSlide + 1">
                        &#8594;
                    </button>
                </div>
            </div>

            <div class="absolute w-full flex items-center justify-center">
                <template x-for="(key, index) in slideLength + 1">
                    <button
                        class="flex-1 w-4 h-2 mt-4 mx-1 mb-0 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-gray-600 hover:shadow-lg"
                        :class="{ 'bg-gray-600': activeSlide === index, 'bg-gray-100': activeSlide !== index }"
                        x-on:click.prevent="activeSlide = index"
                    ></button>
                </template>
            </div>
        </div>
        <p class="text-xs text-gray-400 mb-3">{{ $name }}</p>
    </a>
    @foreach( $options as $group => $items )
        @if( isset($steps[$group]) )
            <div class="w-full text-sm text-gray-600 mt-2 mb-2">{{ $group }}: {{ $steps[$group] }}</div>
        @else
            <div class="w-full text-sm text-gray-600 mt-2 mb-2">{{ $group }}</div>
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
                             class="rounded-full object-cover w-[30px] h-[30px]">
                    @else
                        {{ $price }}
                    @endif
                </button>
            @endforeach
        </div>
    @endforeach
    @error('selectPriceId')
    <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
    @enderror
    <p class="text-xl text-red-600 pb-3">
        от {{ $selectPriceValue }} р.
    </p>
</div>
