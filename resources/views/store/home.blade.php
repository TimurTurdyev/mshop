<x-layouts.store>
    <x-slot:meta>
        <x-store.meta
            title="{{ $homeSettings->meta_title }}"
            description="{{ $homeSettings->meta_description }}"
            url="{{ route('home') }}"
            image="{{ $homeSettings->meta_image }}"
        ></x-store.meta>
    </x-slot:meta>
    @if( $homeSettings->banners )
        <x-slot:positionTop>
            <section class="bg-gray-50">
                <div class="container px-4 mx-auto"
                     x-data="{ activeSlide: 0, slideLength: {{ count($homeSettings->banners) -1 }} }"
                >
                    @foreach( $homeSettings->banners as $banner )
                        <div class="relative flex flex-col md:flex-row -mx-4"
                             x-show="activeSlide === {{ $loop->index }}"
                        >
                            <div class="md:flex-1 px-4">
                                <img src="{{ asset($banner['image']) }}"
                                     class="h-full w-full object-cover object-center"
                                >
                            </div>
                            <div class="md:flex-1 px-4 py-20 md:order-first"
                                 :class="{'pl-20': slideLength }"
                            >
                                <h3 class="text-3xl mb-4">{!! str($banner['title'])->replace('\n', '<br>') !!}</h3>
                                <p class="text-xl font-light mb-8">
                                    {{ $banner['text'] }}
                                </p>
                                <div class="max-w-sm relative z-10">
                                    <a href="{{ $banner['link'] }}"
                                       class="rounded-md border inline-block border-transparent bg-red-600 px-6 py-4 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none">
                                        Подробнее
                                    </a>
                                </div>
                            </div>
                            <div x-cloak x-show="slideLength" class="absolute inset-0 flex">
                                <div class="flex items-center justify-start w-1/2">
                                    <button
                                        class="bg-gray-600 text-white rounded-full w-12 h-12 md:-ml-6"
                                        x-on:click="activeSlide = activeSlide === 0 ? slideLength : activeSlide - 1">
                                        &#8592;
                                    </button>
                                </div>
                                <div class="flex items-center justify-end w-1/2">
                                    <button
                                        class="bg-gray-600 text-white rounded-full w-12 h-12 md:-mr-6"
                                        x-on:click="activeSlide = activeSlide === slideLength ? 0 : activeSlide + 1">
                                        &#8594;
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </x-slot:positionTop>
    @endif

    <livewire:store.share.featured-products
        :settings="$homeSettings->featured_products"
    ></livewire:store.share.featured-products>

    <div class="bg-gray-50 flex flex-col md:flex-row">
        <div class="md:flex-1">
            <img src="{{ asset('/dist/images/banner-free-design.jpg') }}"
                 class="h-full w-full object-cover object-center"
            >
        </div>
        <div class="md:flex-1 px-8 py-20 min-h-[24rem] md:order-first">
            <h3 class="text-3xl mb-4">test</h3>
            <p class="text-xl font-light mb-8">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            </p>
            <div class="max-w-sm relative z-10">
                <button type="button"
                        @click="$dispatch('design-project')"
                        class="rounded-md border inline-block border-transparent bg-red-600 px-6 py-4 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none">
                    Подробнее
                </button>
            </div>
        </div>
    </div>

    <livewire:store.share.design-project-form></livewire:store.share.design-project-form>

    <div class="py-20">
        <h1 class="text-3xl mb-10">{{ $homeSettings->heading }}</h1>
        {!! $homeSettings->text !!}
    </div>

    <hr class="my-6">

    <livewire:store.share.selection-by-parameters-form></livewire:store.share.selection-by-parameters-form>

    <x-slot:callSpecialist>
        <x-store.call-specialist-block></x-store.call-specialist-block>
    </x-slot:callSpecialist>
</x-layouts.store>
