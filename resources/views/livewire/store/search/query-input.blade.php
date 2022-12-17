<div>
    <div
        x-data="{ dropdownShow: false }"
        class="flex relative">
        <button
            @click="dropdownShow = true"
            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100"
            type="button">{{ $modes[$findMode] }}
            <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
            </svg>
        </button>
        <div x-cloak x-show="dropdownShow"
             @click.away="dropdownShow = false"
             x-transition:enter="duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in"
             x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
             class="absolute left-0 top-full bg-white divide-y divide-gray-100 rounded shadow w-44">
            <ul class="py-1 text-sm text-gray-700">
                @foreach( $modes as $mode => $value )
                    @continue( $mode === $findMode )
                    <li>
                        <button type="button"
                                wire:click="changeMode('{{ $mode }}')"
                                class="inline-flex w-full px-4 py-2 hover:bg-gray-100">
                            {{ $value }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="relative w-full">
            <input type="search"
                   wire:model.debounce.500ms="search"
                   class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                   placeholder="{{ $placeholder }}" required>
            <button type="submit"
                    class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </div>
    </div>

    @foreach( $items as $mode => $item )
        @if( $item->count() )
            <div class="mt-3">
                <div class="mb-2">{{ $modes[$mode] }}</div>
                <ul class="w-full divide-y divide-gray-200">
                    @foreach( $item as $value )
                        <li class="py-2">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img class="w-8 h-8 rounded-full" src="{{ $value->image }}"
                                         alt="{{ $value->name }}">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <a href="{{ $value->slug }}" class="text-sm font-medium text-gray-900 truncate">
                                        {{ $value->name }}
                                    </a>
                                    @if( $value->sku )
                                        <p class="text-sm text-gray-500 truncate">
                                            {{ $value->sku }}
                                        </p>
                                    @endif
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                    {{ $value->price }}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    @endforeach
</div>
