<x-layouts.store>
    <x-slot:meta>
        <x-store.meta
            title="О компании"
            description="О компании"
            url="{{ route('delivery') }}"
            image=""
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
                        <li class="inline-flex items-center space-x-1 md:space-x-3" aria-current="page">
                            <span>/</span>
                            <span class="text-gray-400">О компании</span>
                        </li>
                    </ol>
                </nav>

                <h1 class="text-3xl mb-8">О компании</h1>
                <div class="bg-gray-50 border border-transparent overflow-hidden rounded-md mb-8">
                    <div class="relative flex flex-col md:flex-row -mx-4">
                        <div class="md:flex-1 px-4">
                            <img src="{{ asset('dist/images/info-about-1.jpg') }}"
                                 class="h-full w-full object-cover object-center"
                                 alt="">
                        </div>
                        <div class="md:flex-1 md:order-first py-20 px-4">
                            <p class="font-light">
                                Компания «COMPANY_INFO» — поставщик экологичной офисной мебели российских и зарубежных
                                производителей. Мы предлагаем трендовые модели кабинетов с разнообразной отделкой и
                                декором, которые впишутся в любой интерьер и удовлетворят требования самого искушенного
                                ценителя прекрасного. Мы проверяем каждого производителя и устанавливаем честные цены,
                                которые соответствуют качеству.
                                <br><br>
                                Мы помогаем выбирать готовую мебель и разрабатываем индивидуальные дизайн-проекты по
                                созданию новой мебели. Кроме дизайна и проектирования, организуем доставку, сборку и
                                установку мебели на рабочем месте.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </x-slot:positionTop>

    <div class="text-gray-600 font-light">
        <h2 class="text-2xl mb-8">Сервисы Мира Кабинетов</h2>
        <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-4">
            <div>
                <img src="{{ asset('dist/images/icon-3d-modeling-1.png') }}" alt=""
                     class="object-cover h-auto"
                >
                <h5 class="text-xl my-4">3-D визуализация</h5>
                <p class="text-sm">
                    Наши дизайнеры проработают правильную и эргономичную расстановку мебели для вашего помещения,
                    сделают 3-D визуализацию офиса или кабинета
                </p>
            </div>
            <div>
                <img src="{{ asset('dist/images/icon-coat-of-arms-1.png') }}" alt=""
                     class="object-cover h-auto"
                >
                <h5 class="text-xl my-4">Госзаказчикам</h5>
                <p class="text-sm">
                    Мы делаем закупки офисной мебели для госзаказчиков комфортными, выгодными и надежными
                </p>
            </div>
            <div>
                <img src="{{ asset('dist/images/icon-protractor-1.png') }}" alt=""
                     class="object-cover h-auto"
                >
                <h5 class="text-xl my-4">Выезд специалиста</h5>
                <p class="text-sm">
                    Вы можете заказать на сайте услугу - бесплатный выезд специалиста для замера вашего помещения
                </p>
            </div>
            <div>
                <img src="{{ asset('dist/images/icon-technical-support-1.png') }}" alt=""
                     class="object-cover h-auto"
                >
                <h5 class="text-xl my-4">Тест-драйв мебели</h5>
                <p class="text-sm">
                    Предлагаем услугу - Тест-драйв мебели. Вы оставляете заказ и бесплатно сможете протестировать нашу
                    мебель
                </p>
            </div>
        </div>

        <hr class="my-6 py-3">

        <h2 class="text-2xl mb-8">Мы экономим ваше время</h2>

        <div class="relative flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <img src="{{ asset('dist/images/info-about-2.png') }}"
                     class="h-full w-full object-cover object-center"
                     alt="">
            </div>
            <div class="md:flex-1 py-2 px-4">
                <h5 class="text-2xl font-bold tracking-tight text-gray-900 mb-4">
                    Красивый, уютный и функциональный кабинет — тренд последних лет
                </h5>
                <p class="font-light">
                    Многие экономят на качестве: дешевая фурнитура, дешевые материалы. Не удивительно, что такие
                    кабинеты служат недолго и быстро теряют свой внешний вид. Мы предлагаем премиальную мебель из
                    качественных материалов и фурнитуры, которая прослужит вам много лет.
                    <br><br>
                    Каждый кабинет отправляется на проверку в отдел контроля качества, где сотрудники проводят
                    диагностику всех элементов мебели. Перевозкой занимается собственная логистическая служба, которая
                    обеспечивает безопасность доставки и гарантирует полную сохранность вашего будущего кабинета
                </p>
            </div>
        </div>

    </div>

</x-layouts.store>
