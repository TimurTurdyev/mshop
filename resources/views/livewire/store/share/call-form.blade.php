<div>
    <div class="mb-3">
        <input
            class="border @error('name') border-red-500 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg block w-full p-4"
            placeholder="Имя" type="text" wire:model.lazy="name">
        @error('name')
        <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @endif
    </div>
    <div class="mb-3">
        <input
            class="border @error('phone') border-red-500 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg block w-full p-4"
            placeholder="Телефон" type="text" wire:model.lazy="phone">
        @error('phone')
        <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
        @endif
    </div>
    @if( $showEmail )
        <div class="mb-3">
            <input
                class="border @error('email') border-red-500 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg block w-full p-4"
                placeholder="Почта" type="text" wire:model.lazy="email">
            @error('email')
            <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @endif
        </div>
    @endif
    @if( session('success') )
        <div
            x-init="show = false"
            class="p-4 mb-6 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
            role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="mt-6">
        <button type="button"
                wire:click="send"
                class="rounded-md border border-transparent bg-red-600 px-6 py-4 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none">
            {{ $buttonTitle }}
        </button>
    </div>
</div>
