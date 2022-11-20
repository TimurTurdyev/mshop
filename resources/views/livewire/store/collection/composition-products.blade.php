<div>
    @if( count($compositions) )
        <h2 class="text-2xl mb-4">Состав</h2>
        @foreach( $compositions as $key => $composition )
            <div class="text-sm text-gray-600 grid grid-cols-6 mb-2">
                <div class="col-span-3">{{ $composition['name'] }}/({{ $key }})</div>
                <div>{{ $composition['quantity'] }} шт.</div>
                <div class="text-red-600">{{ $composition['price'] * $composition['quantity'] }}р.</div>
                <div>
                    <button type="button" wire:click.prevent="quantityIncrease({{ $key }})">
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="1"
                             fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="16"></line>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg>
                    </button>
                    <button type="button" wire:click.prevent="quantityDecrease({{ $key }})">
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="1"
                             fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg>
                    </button>
                </div>
            </div>
        @endforeach
        <hr class="my-6">
        <p class="text-3xl mb-4 text-red-600">
            {{ $total }} р.
        </p>
        <button type="button"
                wire:click="addCart"
                class="w-full rounded-md border border-transparent bg-red-600 px-4 py-3 font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none">
            В корзину
        </button>
    @else
        <p class="text-3xl mb-10 text-red-600">
            от {{ $defaultPrice }} р.
        </p>
    @endif
</div>
