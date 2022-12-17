<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{ $meta }}
    <base href="{{ route('home') }}"/>
    @vite(['resources/js/app.js'])
</head>
<body>
<header class="mb-5"
        x-data="{ showMenu: false, search: false }"
>
    <div class="bg-gray-100">
        <div class="container px-4 mx-auto flex items-center justify-between text-gray-600 font-light py-2 text-sm">
            <a href="" class="flex group hover:text-gray-800">
                <svg class="text-gray-500 group-hover:text-gray-800 mr-2" viewBox="0 0 24 24" width="20" height="20"
                     stroke="currentColor"
                     stroke-width="1.5" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                Москва
            </a>
            <div>
                <div class="xl:hidden">
                    <a href="#" class="text-xl font-normal text-rose-500 hover:text-rose-400">+7 (495) 777-22-33</a>
                </div>
                <div class="hidden xl:flex space-x-6">
                    @foreach( $generalSettings->menu_top as $item )
                        <a href="{{ $item['link'] }}" class="hover:text-gray-800">{{ $item['title'] }}</a>
                    @endforeach
                    <div class="pl-20 flex space-x-10">
                        <button type="button" @click="search = true">
                            <svg class="text-gray-500 hover:text-gray-800" viewBox="0 0 24 24" width="20" height="20"
                                 stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-4 mx-auto flex items-center justify-between text-gray-600 font-light py-6 text-sm mb-2">
        <div class="flex items-center">
            <button type="button" class="xl:hidden mr-6"
                    @click="showMenu = true"
            >
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
            <a @if( !request()->is('/') ) href="{{ route('home') }}"
               @endif class="border-4 border-rose-600 w-8 h-8 xl:w-16 xl:h-16 relative">
                <div
                    class="absolute top-[10%] xl:top-1/4 left-1/4 bg-white text-sm xl:text-2xl font-bold text-black whitespace-nowrap">
                    Правильный
                    офис
                </div>
            </a>
        </div>

        <div class="xl:hidden flex space-x-4">
            <button type="button" @click="search = true">
                <svg class="text-gray-500 hover:text-gray-800" viewBox="0 0 24 24" width="20" height="20"
                     stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"
                     stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>

            <button type="button"
                    x-data="{ cartCount: 0 }" @click="$dispatch('change-cart-show')"
                    @set-cart-count.window="cartCount = $event.detail"
                    class="inline-flex items-center"
            >
                <svg class="text-gray-500 hover:text-gray-800" viewBox="0 0 24 24" width="20" height="20"
                     stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"
                     stroke-linejoin="round">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                <span class="bg-gray-100 text-gray-600 text-xs ml-2 mr-1 px-1.5 py-0.5 rounded" x-show="cartCount"
                      x-text="cartCount"></span>
            </button>
        </div>

        <div class="hidden xl:flex items-center space-x-6 text-base">
            <a href="#" class="text-3xl font-normal text-rose-500 hover:text-rose-400">{{ $generalSettings->phone }}</a>
            <div>{!! str($generalSettings->address)->replace('\n', '<br>') !!}</div>
        </div>
    </div>
    <div class="hidden container mx-auto xl:flex item-center space-x-8 text-sm">
        @foreach( $generalSettings->menu_main as $item )
            <a href="{{ $item['link'] }}" class="flex items-center space-x-1">
                {!! $item['icon'] !!}
                <span>{!! str($item['title'])->replace('\n', '<br>') !!}</span>
            </a>
        @endforeach
    </div>
    <div x-show="showMenu" x-transition:enter="duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in"
         x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
         class="z-50 absolute inset-x-0 top-0 origin-top-right transform p-2 transition md:hidden" x-ref="mobileMenu"
         @click.away="showMenu = false" style="display: none;">
        <div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
            <div class="px-5 pt-5 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        Каталог
                    </div>
                    <div class="-mr-2">
                        <button type="button"
                                class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                @click="showMenu = false">
                            <span class="sr-only">Закрыть меню</span>
                            <svg class="h-6 w-6"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-6">
                    <nav class="grid gap-y-8">
                        @foreach( $generalSettings->menu_main as $item )
                            <a href="{{ $item['link'] }}"
                               class="-m-3 flex items-center rounded-md p-3 hover:bg-gray-50">
                                {!! $item['icon'] !!}
                                <span
                                    class="ml-3 text-base font-medium text-gray-900">{{ str($item['title'])->replace('\n', ' ') }}</span>
                            </a>
                        @endforeach
                    </nav>
                </div>
            </div>
            <div class="space-y-6 py-6 px-5">
                <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                    @foreach( $generalSettings->menu_top as $item )
                        <a href="{{ $item['link'] }}"
                           class="text-base font-medium text-gray-900 hover:text-gray-700">{{ $item['title'] }}</a>
                    @endforeach
                </div>
                <div>
                    {{--                    <a href="#"--}}
                    {{--                       class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Sign--}}
                    {{--                        up</a>--}}
                    {{--                    <p class="mt-6 text-center text-base font-medium text-gray-500">--}}
                    {{--                        Existing customer?--}}
                    {{--                        <!-- space -->--}}
                    {{--                        <a href="#" class="text-indigo-600 hover:text-indigo-500">Sign in</a>--}}
                    {{--                    </p>--}}
                </div>
            </div>
        </div>
    </div>
    <div x-show="search" x-transition:enter="duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in"
         x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
         class="z-50 absolute inset-x-0 top-0 origin-top-right transform p-2 transition" x-ref="searchBlock"
         @click.away="search = false" style="display: none;">
        <div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
            <div class="px-5 pt-5 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        Поиск по сайту
                    </div>
                    <div class="-mr-2">
                        <button type="button"
                                class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                @click="search = false">
                            <span class="sr-only">Закрыть поиск</span>
                            <svg class="h-6 w-6"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-6">

                </div>
            </div>
        </div>
    </div>
</header>

@isset( $positionTop )
    {{ $positionTop }}
@endif

<section class="container px-4 mx-auto xl:pt-10 pb-10" x-data>
    {{ $slot }}
</section>

@isset( $positionBottom )
    {{ $positionBottom }}
@endif

@php( $footer_bg = 'bg-gray-100' )

@isset( $callSpecialist )
    @php( $footer_bg = 'bg-white' )

    {{ $callSpecialist }}
@endif

<footer class="{{ $footer_bg }}">
    <div
        class="container px-4 mx-auto flex flex-col md:flex-row md:space-x-16 text-gray-600 font-light py-10 text-sm mb-2">
        <div class="flex-column items-center space-y-4 xl:space-y-12 min-w-[320px] mb-10 md:mb-0">
            <div class="border-4 border-rose-600 w-8 h-8 xl:w-16 xl:h-16 relative">
                <div
                    class="absolute top-[10%] xl:top-1/4 left-1/4 {{ $footer_bg }} text-sm xl:text-2xl font-bold text-black whitespace-nowrap">
                    Правильный
                    офис
                </div>
            </div>
            <div class="flex-column items-center space-y-4 text-base">
                <a href="{{ str($generalSettings->phone)->replace([' ', '(', ')', '-'], '') }}"
                   class="block text-sm xl:text-3xl font-normal text-rose-500 hover:text-rose-400">
                    {{ $generalSettings->phone }}
                </a>
                <div>{!! str($generalSettings->address)->replace('\n', '<br>') !!}</div>
            </div>
        </div>

        <div class="grow grid gap-x-8 gap-y-4 grid-cols-2 xl:grid-cols-4">
            @foreach( $generalSettings->menu_footer as $item )
                <ul class="flex-column items-center space-y-4 text-base">
                    @foreach( $item as $value )
                        <li><a href="{{ $value['link'] }}">{{ $value['title'] }}</a></li>
                    @endforeach
                </ul>
            @endforeach
        </div>

    </div>
</footer>

<button type="button" x-data="{ cartCount: 0 }" @click="$dispatch('change-cart-show')"
        @set-cart-count.window="cartCount = $event.detail"
        class="hidden xl:inline-flex xl:items-center fixed z-10 right-0 top-1/3 bg-red-600 text-white rounded-l-lg p-3">
    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
         stroke-linecap="round" stroke-linejoin="round">
        <circle cx="9" cy="21" r="1"></circle>
        <circle cx="20" cy="21" r="1"></circle>
        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
    </svg>
    <span class="bg-white text-gray-600 text-xs ml-2 mr-1 px-1.5 py-0.5 rounded" x-show="cartCount"
          x-text="cartCount"></span>
</button>
<livewire:store.cart.order></livewire:store.cart.order>

@livewireScripts
</body>
</html>
