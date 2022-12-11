<x-layouts.store>
    <x-slot:meta>
        <x-store.meta
            title="Блог"
            description="Блог компании"
            url="{{ route('blog') }}"
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
                <span class="text-gray-400">Блог</span>
            </li>
        </ol>
    </nav>
    <h1 class="text-3xl mb-10">Блог</h1>

    @if( $posts->total() )

        <div class="py-7 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach( $posts as $item )
                @if( $loop->first )
                    <div class="group relative col-span-4 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 xl:gap-x-8 w-full">
                        <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
                            <img src="{{ $item->image }}" alt="" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 mb-3">{{ $item->created_at }}</p>
                            <a href="{{ route('blog.post', $item) }}" class="text-2xl mb-3">{{ $item->name }}</a>
                            <p>{{ $item->preview }}</p>
                        </div>
                    </div>
                @else
                    <div class="group relative">
                        <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
                            <img src="{{ $item->image }}" alt="{{ $item->name }}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                        <div class="mt-4">
                            <p class="text-xs text-gray-400 mb-3">{{ $item->created_at }}</p>
                            <a href="{{ route('blog.post', $item) }}" class="text-2xl mb-3">{{ $item->name }}</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <hr class="my-6 py-3">
        {{ $posts->links() }}
    @else
        пусто...
    @endif

</x-layouts.store>
