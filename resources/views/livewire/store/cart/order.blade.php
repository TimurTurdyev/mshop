<div x-cloak
     x-data="{ open: false, wireInit: false }"
     @keydown.window.escape="open = false"
     @change-cart-show.window="open = !open"
     x-show="open"
     class="relative z-10" aria-labelledby="slide-over-title" x-ref="cart-dialog" aria-modal="true">
    <div x-show="open" x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500"
         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 overflow-hidden" wire:init="loadCart">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                <div x-show="open" x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                     x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                     x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                     x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                     class="pointer-events-auto w-screen max-w-md"
                     @click.outside="open = false"
                >
                    <div wire:key="open-{{ now() }}" @if( $open ) x-init="open=true" @endif></div>
                    <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                        <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                            <div class="flex items-start justify-between">
                                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                                    Оформление заказа
                                </h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button type="button"
                                            class="-m-2 p-2 text-gray-400 hover:text-gray-500"
                                            @click="open = false"
                                    >
                                        <span class="sr-only">Закрыть корзину</span>
                                        <svg class="h-6 w-6"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="h-full">
                                @if( $cartTotalQuantity < 1 )
                                    <div class="h-full flex items-center justify-center content-center">
                                        <div class="text-xl text-gray-300" x-text="'В корзине пусто'"></div>
                                    </div>
                                @endif
                                <ul role="list" class="mt-8 -my-6 divide-y divide-gray-200">
                                    @foreach( $items as $item )
                                        <li class="flex py-6">
                                            <div
                                                class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                <img
                                                    src="{{ $item->attributes->image }}"
                                                    alt="{{ $item->name }}"
                                                    class="h-full w-full object-cover object-center">
                                            </div>

                                            <div class="ml-4 flex flex-1 flex-col">
                                                <div>
                                                    <div
                                                        class="flex justify-between text-base font-medium text-gray-900">
                                                        <h3>
                                                            <a href="#">{{ $item->name }}</a>
                                                        </h3>
                                                        <button type="button"
                                                                class="font-medium text-gray-600 hover:text-gray-500"
                                                                wire:click="removeItem({{ $item->id }})"
                                                        >
                                                            <svg viewBox="0 0 24 24" width="24" height="24"
                                                                 stroke="currentColor" stroke-width="1"
                                                                 fill="none"
                                                                 stroke-linecap="round" stroke-linejoin="round"
                                                                 class="css-i6dzq1">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    @foreach( $item->attributes->properties as $attribute )
                                                        <p class="mt-1 text-sm text-gray-500">
                                                            {{ $attribute['option_name'] }}
                                                            : {{ $attribute['option_value'] }}
                                                        </p>
                                                    @endforeach
                                                </div>
                                                <div class="flex flex-1 items-end justify-between text-sm">
                                                    <p class="text-gray-500">{{ $item->quantity }} шт.</p>

                                                    <p class="ml-4 text-red-600">
                                                        {{ $item->price }} р.
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 py-6 px-4 sm:px-6"
                             x-init="$dispatch('set-cart-count', {{ $cartTotalQuantity }});">
                            @if( $cartTotalQuantity )
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <p>Итого: ({{ $cartTotalQuantity }} шт.)</p>
                                    <p>{{ $cartSubTotal }} р.</p>
                                </div>
                                <p class="mt-0.5 text-sm text-gray-500">Заполните форму и в течении 5 минут с Вами
                                    свяжется
                                    специалист для уточнения всех деталей заказа.</p>
                                <div class="mb-3 mt-6">
                                    <input
                                        class="border @error('name') border-red-500 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                        placeholder="Имя" type="text" wire:model.lazy="name">
                                    @error('name')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <input
                                        class="border @error('phone') border-red-500 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                        placeholder="Телефон" type="text" wire:model.lazy="phone">
                                    @error('phone')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <input
                                        class="border @error('email') border-red-500 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                        placeholder="Почта" type="email" wire:model.lazy="email">
                                    @error('email')
                                    <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                                    @endif
                                </div>
                                <div class="mt-6">
                                    <button type="button"
                                            wire:click="send"
                                            class="w-full rounded-md border border-transparent bg-red-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-red-700">
                                        Оформить заказ
                                    </button>
                                </div>
                            @endif
                            @if( session('success') )
                                <div
                                    class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg"
                                    role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                <p>
                                    или
                                    <button type="button"
                                            class="font-medium text-red-600 hover:text-red-500"
                                            @click="open = false">
                                        продолжить покупки
                                        <span aria-hidden="true"> →</span>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
