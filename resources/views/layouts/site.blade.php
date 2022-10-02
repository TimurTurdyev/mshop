<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header>
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
            <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <span>Руководителям</span>
        </a>
        <a href="#" class="flex items-center space-x-1">
            <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <span>Персоналу</span>
        </a>
        <a href="#" class="flex items-center space-x-1 max-w-[200px]">
            <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <span class="flex-1">Переговорные <br>и конференц залы</span>
        </a>
        <a href="#" class="flex items-center space-x-1">
            <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <span>Мягкая зона</span>
        </a>
        <a href="#" class="flex items-center space-x-1">
            <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <span>Приемные</span>
        </a>
        <a href="#" class="flex items-center space-x-1 max-w-[200px]">
            <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <span class="flex-1">Зонирование <br>и шумоподавление</span>
        </a>
        <a href="#" class="flex items-center space-x-1">
            <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <span>Сервис s</span>
        </a>
    </div>
</header>

</body>
</html>
