<div class="py-7 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
    @foreach( $products->items() as $product )
        <livewire:store.share.product-card
            wire:key="{{ $product->id }}-{{ now() }}"
            :model="$product"
        ></livewire:store.share.product-card>
    @endforeach
</div>
