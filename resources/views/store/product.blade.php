<x-layouts.store>
    <x-slot:meta>
        <x-store.meta
            title="{{ $product->page->meta_title }}"
            description="{{ $product->page->meta_description }}"
            url="{{ route('collection.show', $product->id) }}"
            image="{{ $product->page->meta_image }}"
        ></x-store.meta>
    </x-slot:meta>


    <div class="pb-5">
        <livewire:store.product.product-show
            :selectPriceId="$selectPriceId"
            :model="$product">
        </livewire:store.product.product-show>
    </div>
</x-layouts.store>
