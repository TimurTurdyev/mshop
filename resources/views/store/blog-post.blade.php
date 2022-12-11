<x-layouts.store>
    <x-slot:meta>
        <x-store.meta
            title="{{ $post->page->meta_title }}"
            description="{{ $post->page->meta_description }}"
            url="{{ route('blog.post', $post) }}"
            image="{{ $post->page->meta_image }}"
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
                            <a href="{{ route('blog') }}">
                                Блог
                            </a>
                        </li>
                        <li class="inline-flex items-center space-x-1 md:space-x-3" aria-current="page">
                            <span>/</span>
                            <span class="text-gray-400">{{ $post->name }}</span>
                        </li>
                    </ol>
                </nav>
                <div class="flex flex-col md:flex-row py-4 -mx-4">
                    <div class="md:flex-1 py-2 px-4 mb-4">
                        <img src="{{ asset($post->image) }}"
                             class="h-full w-full object-cover object-center"
                        >
                    </div>
                    <div class="md:flex-1 px-4 md:order-first">
                        <h3 class="text-3xl mb-4">{{ $post->page->heading }}</h3>
                        <p class="text-xs font-light text-gray-400 mb-8">
                            {{ $post->created_at }}
                        </p>
                        <p class="text-sm font-light">
                            {{ $post->preview }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </x-slot:positionTop>

    {!! $post->page->text_html !!}

</x-layouts.store>
