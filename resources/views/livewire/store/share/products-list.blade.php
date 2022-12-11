<div>
    @if( $products->total() )

        @if( $heading )
            <h2 class="text-2xl mb-3">{{ $heading }}({{ $products->total() }})</h2>
        @endif

        <div class="py-7 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @if( $type == 'product')
                @foreach( $products->items() as $product )
                    <livewire:store.share.product-card
                        wire:key="{{ $product->id }}-{{ now() }}"
                        :model="$product"
                        :steps="$steps"
                        :currentStep="$currentStep"
                    ></livewire:store.share.product-card>
                @endforeach
            @else
                @foreach( $products->items() as $product )
                    <livewire:store.share.collection-card
                        wire:key="{{ $product->id }}-{{ now() }}"
                        :model="$product"
                        :steps="$steps"
                        :currentStep="$currentStep"
                    ></livewire:store.share.collection-card>
                @endforeach
            @endif
        </div>

        {{ $products->links() }}
        <hr class="my-6 py-3">
    @endif
</div>
