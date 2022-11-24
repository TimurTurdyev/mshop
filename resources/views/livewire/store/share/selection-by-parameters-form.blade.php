<div class="py-10">
    <h3 class="text-3xl mb-8">Подбор кабинета по параметрам</h3>

    <div class="py-8 flex space-x-10" wire:key="{{ now() }}">
        @foreach( $steps as $step )
            <button type="button"
                    @if( $loop->index <= $index )
                        wire:click="tab({{ $loop->index }})"
                    class="text-red-600"
                    @else
                        class="text-gray-300"
                    disabled
                @endif
            >
                <span class="
                inline-flex
                justify-center
                items-center
                border
                border-width-1
                rounded-full
                @if( $loop->index <= $index )
                border-red-600 text-red-600
                @else
                border-gray-300 text-gray-300
                @endif
                w-8 h-8 mr-2
                ">{{ $loop->index + 1 }}</span>
                {{ str($step)->upper() }}
            </button>
        @endforeach
    </div>
    {{ $index }}
    {{ implode(', ', $choices) }}

    <div class="bg-gray-50 flex flex-col md:flex-row">
        @if( $index < 4 )
            <div class="md:flex-1">
                <img src="{{ asset($content['image']) }}"
                     class="h-full w-full object-cover object-center"
                >
            </div>
            <div class="md:flex-1 px-8 py-20 min-h-[24rem] md:order-first">
                <h3 class="text-xl mb-6">{{ $content['title'] }}</h3>

                @if( $index < 3 )
                    <ul>
                        @foreach( $variants as $variant )
                            <li class="mb-4">
                                <label>
                                    <input type="radio" wire:model="choice" value="{{ $loop->index }}">
                                    {{ $variant }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="font-light mb-4">
                        Вы можете провести предварительные замеры или прислать нам план Вашего помещения. Этого будет
                        достаточно для первичного расчета мебели для кабинета, плана расстановки и 3D визуализации
                    </p>
                    <input
                        class="mb-2 border @error('name') border-red-500 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Введите площадь комнаты м.кв" type="text" wire:model.lazy="choice">
                    <p class="text-xs text-gray-400 mb-6">Оставьте поля пустыми, если Вы не знаете площадь Вашего
                        помещения</p>
                @endif

                @error('choice')
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror

                <div class="max-w-sm relative z-10 flex justify-between">

                    @if( $index > 0 )
                        <button type="button"
                                wire:click="tab({{ $index - 1 }})"
                                class="mt-6 rounded-md border border-transparent px-6 py-3 text-base font-medium text-red-600 shadow-sm border-red-600">
                            Назад
                        </button>
                    @endif
                    <button type="button"
                            wire:click="next({{ $index }})"
                            class="mt-6 rounded-md border border-transparent px-6 py-3 text-base font-medium text-red-600 shadow-sm border-red-600">
                        Далее
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>
