<x-layouts.store>
    <x-slot:meta>
        <x-store.meta
            title="Наши проекты"
            description="Проекты компании"
            url="{{ route('project') }}"
            image=""
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
                <span class="text-gray-400">Наши проекты</span>
            </li>
        </ol>
    </nav>
    <h1 class="text-3xl mb-10">Наши проекты</h1>

    @if( $projects->total() )

        <div class="py-7 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 xl:gap-x-8">
            @foreach( $projects as $item )
                <div class="group relative">
                    <div
                        class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
                        <img src="{{ $item->image }}" alt="{{ $item->name }}"
                             class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <div class="mt-4">
                        <p class="text-xs text-gray-400 mb-3">{{ $item->company }}</p>
                        <a href="{{ route('project.post', $item) }}" class="text-2xl mb-3">{{ $item->name }}</a>
                    </div>
                </div>
            @endforeach
        </div>

        <hr class="my-6 py-3">
        {{ $projects->links() }}
    @else
        пусто...
    @endif

</x-layouts.store>
