<x-layouts.store>
    <x-slot:meta>
        <x-store.meta
            title="{{ $project->page->meta_title }}"
            description="{{ $project->page->meta_description }}"
            url="{{ route('blog.post', $project) }}"
            image="{{ $project->page->meta_image }}"
        ></x-store.meta>
    </x-slot:meta>

    <x-slot:positionTop>
        <section class="bg-gray-50 mb-6">
            <div class="container px-4 py-6 mx-auto">
                <nav class="py-3 text-gray-600 text-sm mb-3" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center space-x-1 md:space-x-3">
                            <a href="{{ route('home') }}">
                                Главная
                            </a>
                        </li>
                        <li class="inline-flex items-center space-x-1 md:space-x-3">
                            <span>/</span>
                            <a href="{{ route('project') }}">
                                Наши проекты
                            </a>
                        </li>
                        <li class="inline-flex items-center space-x-1 md:space-x-3" aria-current="page">
                            <span>/</span>
                            <span class="text-gray-400">{{ $project->name }}</span>
                        </li>
                    </ol>
                </nav>
                <div class="flex flex-col md:flex-row py-4 -mx-4">
                    <div class="md:flex-1 py-2 px-4 mb-4">
                        <img src="{{ asset($project->image) }}"
                             class="h-full w-full object-cover object-center"
                        >
                    </div>
                    <div class="md:flex-1 px-4 md:order-first">
                        <h3 class="text-3xl mb-4">{{ $project->page->heading }}</h3>
                        <p class="text-xs font-light text-gray-400 mb-8">
                            {{ $project->created_at }}
                        </p>
                        <p class="text-sm font-light">
                            {{ $project->preview }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </x-slot:positionTop>

    {!! $project->page->text_html !!}

    @if( $project->images )
        <div class="py-7 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 xl:gap-x-8">
            @foreach( $project->images as $image )
                <div class="group relative">
                    <div
                        class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
                        <img src="{{ asset($image) }}" alt="{{ $project->name }} - фото {{ $loop->index }}"
                             class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if( $prev || $next )
        <hr class="my-6 py-3">
        <x-store.prev-and-next
            :prev="$prev"
            :next="$next"
            route="project.post"
        ></x-store.prev-and-next>
    @endif

</x-layouts.store>
