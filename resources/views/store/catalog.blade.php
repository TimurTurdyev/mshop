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

    <div class="flex justify-between px-5 py-3 text-gray-600 rounded-lg bg-gray-50 mb-10">
        <div class="flex items-center space-x-10">
            <div>test</div>
            <div>test</div>
            <div>test</div>
        </div>
        <div class="flex items-center space-x-3">
            <svg class="-rotate-90" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                 fill="none"
                 stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="20" x2="12" y2="10"></line>
                <line x1="18" y1="20" x2="18" y2="4"></line>
                <line x1="6" y1="20" x2="6" y2="16"></line>
            </svg>
            <span>Сортировка</span>
        </div>
    </div>

    <x-store.catalog :entityItems="$entityItems" :show="$catalog->entity_show->name"></x-store.catalog>

</x-layouts.store>
