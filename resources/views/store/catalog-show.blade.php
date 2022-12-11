<x-layouts.store>
    <x-slot:meta>
        <x-store.meta
            title="{{ $catalog->page->meta_title }}"
            description="{{ $catalog->page->meta_description }}"
            url="{{ route('catalog.show', $catalog->slug) }}"
            image="{{ $catalog->page->meta_image }}"
        ></x-store.meta>
    </x-slot:meta>

    <!-- Breadcrumb -->
    <nav class="py-3 text-gray-600 text-sm mb-3" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center space-x-1 md:space-x-3">
                <a href="{{ route('home') }}">
                    Главная
                </a>
            </li>
            <li class="inline-flex items-center space-x-1 md:space-x-3" aria-current="page">
                <span>/</span>
                <span class="text-gray-400">{{ $catalog->name }}</span>
            </li>
        </ol>
    </nav>
    <h1 class="text-3xl mb-10">{{ $catalog->name }}</h1>

    <livewire:store.share.filter-product-form
        :type="$catalog->entity_show"
        :filterCatalogs="[$catalog->id]"
    >
    </livewire:store.share.filter-product-form>

    <livewire:store.share.products-list
        :type="$catalog->entity_show"
        :filterCatalogs="[$catalog->id]"
    >
    </livewire:store.share.products-list>

</x-layouts.store>
