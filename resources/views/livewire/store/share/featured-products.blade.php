<div>
    <div class="py-10">
        @foreach( $settings as $setting )
            <button type="button"
                    wire:click.prevent="changeTab({{ $loop->index }})"
                    class="
                inline-flex
                items-center
                py-2
                px-4
                mr-3
                text-xs
                font-medium
                @if( $tabActive === $loop->index )
                text-white
                bg-red-600
                @else
                text-gray-900
                bg-white
                @endif
                rounded-lg
                border
                border-gray-200
                focus:outline-none
                hover:bg-red-700
                hover:text-white
                ">
                {{ $setting['group'] }}
            </button>
        @endforeach

        <div class="py-7 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach( $prices as $price )
                <div class="group relative">
                    <a href="{{ route('collection.show', $price->slug) }}?price={{ $price->price_id }}">
                        <div
                            class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-50 mb-3">
                            <img src="{{ $price->imageFirst() }}"
                                 class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                        <p class="text-xs text-gray-400">{{ $price->name }}</p>
                        <h3 class="text-sm text-gray-600 mt-2 mb-2">
                            {{ $price->price_name }}
                        </h3>
                        <p class="text-xl text-red-600 pb-3">
                            от {{ $price->price }} р.
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
