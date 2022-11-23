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
<header class="mb-5">
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
                        <a href="#" class="flex group hover:text-gray-800">
                            <svg class="text-gray-500 group-hover:text-gray-800 mr-2" viewBox="0 0 24 24" width="20"
                                 height="20" stroke="currentColor" stroke-width="1.5"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                            Избранное
                        </a>
                        <a href="">
                            <svg class="text-gray-500 hover:text-gray-800" viewBox="0 0 24 24" width="20" height="20"
                                 stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-4 mx-auto flex items-center justify-between text-gray-600 font-light py-6 text-sm mb-2">
        <div class="flex items-center">
            <button type="button" class="xl:hidden mr-6">
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
            <a href="#">
                <svg class="text-gray-500 group-hover:text-gray-800" viewBox="0 0 24 24" width="20"
                     height="20" stroke="currentColor" stroke-width="1.5"
                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>
            </a>
            <a href="">
                <svg class="text-gray-500 hover:text-gray-800" viewBox="0 0 24 24" width="20" height="20"
                     stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"
                     stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </a>
            <a href="">
                <svg class="text-gray-500 hover:text-gray-800" viewBox="0 0 24 24" width="20" height="20"
                     stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"
                     stroke-linejoin="round">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
            </a>
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
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
