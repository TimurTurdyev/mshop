<x-layouts.store>
    <x-slot:meta>
        <x-store.meta
            title="{{ $collection->page->meta_title }}"
            description="{{ $collection->page->meta_description }}"
            url="{{ route('collection.show', $collection->id) }}"
            image="{{ $collection->page->meta_image }}"
        ></x-store.meta>
    </x-slot:meta>


    <div class="pb-5">
        <livewire:store.collection.collection-show
            :selectPriceId="$selectPriceId"
            :model="$collection">
        </livewire:store.collection.collection-show>
    </div>


    @if( $groups->count() )
        <hr class="my-6 py-3">
        <h2 class="text-3xl mb-10">Элементы коллекции</h2>

        @foreach( $groups as $group )
            <livewire:store.share.products-list
                :heading="$group->name"
                :filterGroups="[$group->id]"
                :filterCollections="[$collection->id]"
                :selectedOptions="$selectedOptions"
            >
            </livewire:store.share.products-list>
        @endforeach
    @endif
</x-layouts.store>
