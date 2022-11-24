<div x-cloak
     x-data="{ open: false }"
     @keydown.window.escape="open = false"
     @change-design-project-form-show.window="open = !open"
     x-show="open"
     class="relative z-20" aria-labelledby="slide-over-title" x-ref="cart-dialog" aria-modal="true">
    <div x-show="open" x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500"
         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                <div x-show="open" x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                     x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                     x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                     x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                     class="pointer-events-auto w-screen max-w-md"
                     @click.outside="open = false"
                >
                    <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                        <div class="py-6 px-4 sm:px-6">
                            <div class="flex items-start justify-between">
                                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                                    Форма заявки
                                </h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button type="button"
                                            class="-m-2 p-2 text-gray-400 hover:text-gray-500"
                                            @click="open = false"
                                    >
                                        <span class="sr-only">Закрыть</span>
                                        <svg class="h-6 w-6"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="flex-1 border-t border-gray-200 py-6 px-4 sm:px-6">
                            <p class="mt-0.5 text-sm text-gray-500">Заполните форму и в течении 5 минут с Вами свяжется
                                специалист для уточнения всех деталей заказа.</p>
                            <div class="mb-3 mt-6">
                                <input
                                    class="border @error('name') border-red-500 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    placeholder="Имя" type="text" wire:model.lazy="name">
                                @error('name')
                                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <input
                                    class="border @error('phone') border-red-500 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    placeholder="Телефон" type="text" wire:model.lazy="phone">
                                @error('phone')
                                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <input
                                    class="border @error('email') border-red-500 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    placeholder="Почта" type="email" wire:model.lazy="email">
                                @error('email')
                                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                                @endif
                            </div>
                            <div class="mt-6 mb-8">
                                <button type="button"
                                        wire:click="send"
                                        class="w-full rounded-md border border-transparent bg-red-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-red-700">
                                    Отправить
                                </button>
                            </div>
                            @if( session('success') )
                                <div
                                    class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                                    role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
