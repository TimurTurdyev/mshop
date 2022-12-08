<div>
    <div class="flex justify-between px-5 py-3 text-gray-600 rounded-lg bg-gray-50 mb-10">
        <div class="flex items-center space-x-10">
            <button type="button"
                    class="bg-white rounded-lg border border-gray-200 hover:bg-gray-100 py-1.5 px-2"
                    @click="$dispatch('filters')"
            >
                Фильтры
            </button>
        </div>
        <div class="flex items-center space-x-3">
            <svg class="-rotate-90" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                 fill="none"
                 stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="20" x2="12" y2="10"></line>
                <line x1="18" y1="20" x2="18" y2="4"></line>
                <line x1="6" y1="20" x2="6" y2="16"></line>
            </svg>
            <span>Сортировка</span>
        </div>
    </div>
    <x-store.slide-popup>
        <x-slot:title>Фильтр</x-slot:title>
        <x-slot:event_toggle_open>filters</x-slot:event_toggle_open>
        @foreach( $options as $group => $items )
            <div class="w-full mt-2 mb-2">{{ $group }}</div>
            <div class="max-h-44 overflow-y-auto">
                <div class="flex flex-wrap flex-col text-gray-600 text-sm space-y-2 mb-5">
                    @foreach( $items as $price => $item )
                        <div class="flex items-center w-full">
                            <input id="form-option{{ $item['option_id'] }}-{{ $item['option_value_id'] }}"
                                   type="checkbox"
                                   wire:model="selectedOptions"
                                   value="{{ $item['option_id'] }}-{{ $item['option_value_id'] }}"
                                   class="peer w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="form-option{{ $item['option_id'] }}-{{ $item['option_value_id'] }}"
                                   class="flex items-center ml-2">
                                @if( $item['image'] )
                                    <span class="inline-block border p-1 mr-2 border-gray-300 @if( $item['image'] ) rounded-full @endif
                                peer-checked:border-gray-600 hover:text-gray-600 cursor-pointer">
                                <img src="{{ $item['image'] }}" alt="{{ $price }}"
                                     class="rounded-full object-cover w-[20px] h-[20px]">
                            </span>
                                @endif
                                {{ $item['value'] }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        @if( $brands )
            <hr class="my-6">
            <div class="w-full mt-2 mb-2">Бренд</div>
            <div class="max-h-44 overflow-y-auto">
                <div class="flex flex-wrap flex-col text-gray-600 text-sm space-y-2 mb-5">
                    @foreach( $brands as $item )
                        <div class="flex items-center w-full">
                            <input id="form-brand{{ $item['id'] }}"
                                   type="checkbox"
                                   wire:model="selectedBrands"
                                   value="{{ $item['id'] }}"
                                   class="peer w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="form-brand{{ $item['id'] }}"
                                   class="flex items-center ml-2">
                                {{ $item['name'] }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </x-store.slide-popup>
</div>
