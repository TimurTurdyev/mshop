<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome</title
    @vite(['resources/js/app.js'])
</head>
<body>
<header class="mb-5">
    <div class="bg-gray-100">
        <div class="container mx-auto flex items-center justify-between text-gray-600 font-light py-2 text-sm">
            <a href="" class="flex group hover:text-gray-800">
                <svg class="text-gray-500 group-hover:text-gray-800 mr-2" viewBox="0 0 24 24" width="20" height="20"
                     stroke="currentColor"
                     stroke-width="1.5" fill="none"
                     stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                Москва
            </a>
            <div>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-gray-800">О компании</a>
                    <a href="#" class="hover:text-gray-800">Доставка и сборка</a>
                    <a href="#" class="hover:text-gray-800">Оплата</a>
                    <a href="#" class="hover:text-gray-800">Наши работы</a>
                    <a href="#" class="hover:text-gray-800">Контакты</a>
                    <a href="#" class="hover:text-gray-800">Блог</a>
                    <div class="pl-20 flex space-x-10">
                        <a href="#" class="flex group hover:text-gray-800">
                            <svg class="text-gray-500 group-hover:text-gray-800 mr-2" viewBox="0 0 24 24" width="20"
                                 height="20" stroke="currentColor" stroke-width="1.5"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                            Избранное
                        </a>
                        <a href="">
                            <svg class="text-gray-500 hover:text-gray-800" viewBox="0 0 24 24" width="20" height="20"
                                 stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"
                                 stroke-linejoin="round" class="css-i6dzq1">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto flex items-center justify-between text-gray-600 font-light py-6 text-sm mb-2">
        <div class="border-4 border-rose-600 w-16 h-16 relative">
            <div class="absolute top-1/4 left-1/4 bg-white text-2xl font-bold text-black whitespace-nowrap">Правильный
                офис
            </div>
        </div>

        <div class="flex items-center space-x-6 text-base">
            <a href="#" class="text-3xl font-normal text-rose-500 hover:text-rose-400">+7 (495) 777-22-33</a>
            <div>ММДЦ Москва Сити, <br>Пресненская набережная 8, с1</div>
        </div>
    </div>
    <div class="container mx-auto flex item-center space-x-8 text-sm">
        <a href="#" class="flex items-center space-x-1">
            <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none"
                 stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <span>Руководителям</span>
        </a>
        <a href="#" class="flex items-center space-x-1">
            <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none"
                 stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <span>Персоналу</span>
        </a>
        <a href="#" class="flex items-center space-x-1 max-w-[200px]">
            <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none"
                 stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <span class="flex-1">Переговорные <br>и конференц залы</span>
        </a>
        <a href="#" class="flex items-center space-x-1">
            <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none"
                 stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <span>Мягкая зона</span>
        </a>
        <a href="#" class="flex items-center space-x-1">
            <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none"
                 stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <span>Приемные</span>
        </a>
        <a href="#" class="flex items-center space-x-1 max-w-[200px]">
            <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none"
                 stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <span class="flex-1">Зонирование <br>и шумоподавление</span>
        </a>
        <a href="#" class="flex items-center space-x-1">
            <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none"
                 stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <span>Сервис</span>
        </a>
    </div>
</header>
<section class="container mx-auto py-10">
    <!-- Breadcrumb -->
    <nav class="py-3 text-gray-600 text-sm mb-3" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center space-x-1 md:space-x-3">
                <a href="#">
                    Главная
                </a>
            </li>
            <li class="inline-flex items-center space-x-1 md:space-x-3">
                <span>/</span>
                <a href="#">Кабинеты руководителя</a>
            </li>
            <li class="inline-flex items-center space-x-1 md:space-x-3" aria-current="page">
                <span>/</span>
                <span class="text-gray-400">Кресло</span>
            </li>
        </ol>
    </nav>
    <h1 class="text-3xl mb-10">Кабинеты руководителя</h1>

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

    <div class="text-2xl">Кабинеты руководителя Мажор от 139 485 ₽</div>
    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
       @for($i = 0; $i < 10; $i++)
            <div class="group relative">
                <div
                    class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-50">
                    <img
                        src="https://s3-alpha-sig.figma.com/img/f26c/5e2d/20e75e6404a137ac3e6e395d05b384bd?Expires=1664755200&Signature=esDAdhz~4aRZf16Vj~u3TYKR0e002w4jNqoUWK7e07Zn8xaAa4EF5QeQjMgHUdeAYIvvJbU8Bd7hF8hLzM~Vkm0h4H1sWwuYPAMCxlcH6PuHCSfuOjP0V6GZgoLmEf-FIj0msTCqu~MJy2isu1eaTwsFEGsKo-KC9a60EUwbbHm2EdOHvoqBR168Q40zK55QRSol9ZHL5zgEeMPY1xL2Pdwu88Rjj3w4C3dlY5Ru9oaEEEb6WmTjKBFYa5zLxH5zkY9wQcotNsCVTqNwpeTz-9gx9PjsHz4bXlFCEQnrNXYPeLtgRkbljYm61igVA5sgxotFLfp9uG1GQhD4TJHyiA__&Key-Pair-Id=APKAINTVSUGEWH5XD5UA"
                        class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                </div>
                <div class="mt-3">
                    <p class="text-xs text-gray-400">Кабинет руководителя</p>
                    <h3 class="text-sm text-gray-600 mt-2">
                        <a href="#">
                            Мажор бук светлый
                        </a>
                    </h3>
                    <p class="text-xl text-red-600"><span class="text-sm mr-1 text-gray-600">от</span>{{ fake()->numberBetween(200_000, 700_00) }} р.</p>
                </div>
            </div>
       @endfor
    </div>
</section>
<footer class="bg-gray-100">
    <div class="container mx-auto flex space-x-16 text-gray-600 font-light py-10 text-sm mb-2">
        <div class="flex-column items-center space-y-12 min-w-[320px]">
            <div class="border-4 border-rose-600 w-16 h-16 relative">
                <div class="absolute top-1/4 left-1/4 bg-gray-100 text-2xl font-bold text-black whitespace-nowrap">
                    Правильный
                    офис
                </div>
            </div>
            <div class="flex-column items-center space-y-4 text-base">
                <a href="#" class="block text-3xl font-normal text-rose-500 hover:text-rose-400">+7 (495) 777-22-33</a>
                <div>ММДЦ Москва Сити, <br>Пресненская набережная 8, с1</div>
            </div>
        </div>

        @for($i = 0; $i < 5; $i++)
            @php
                $l = rand(3, 10);
            @endphp
            <ul class="flex-column items-center space-y-4 text-base">
                @for($j = 0; $j < $l; $j++)
                    <li><a href="">{{ fake()->words(2, true) }}</a></li>
                @endfor
            </ul>
        @endfor

    </div>
</footer>
<div class="fixed z-10 right-0 top-1/3 bg-red-600 text-white rounded-l-lg p-3">
    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
         stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
        <circle cx="9" cy="21" r="1"></circle>
        <circle cx="20" cy="21" r="1"></circle>
        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
    </svg>
</div>
</body>
</html>
