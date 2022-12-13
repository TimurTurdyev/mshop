<x-layouts.store>
    <x-slot:meta>
        <x-store.meta
            title="Доставка и сборка"
            description="Доставка и сборка"
            url="{{ route('delivery') }}"
            image=""
        ></x-store.meta>
    </x-slot:meta>

    <x-slot:positionTop>
        <section class="bg-gray-50 mb-6">
            <div class="container px-4 pt-6 mx-auto">
                <nav class="py-3 text-gray-600 text-sm mb-3" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center space-x-1 md:space-x-3">
                            <a href="{{ route('home') }}">
                                Главная
                            </a>
                        </li>
                        <li class="inline-flex items-center space-x-1 md:space-x-3" aria-current="page">
                            <span>/</span>
                            <span class="text-gray-400">Доставка и сборка</span>
                        </li>
                    </ol>
                </nav>

                <h1 class="text-3xl mb-8">Доставка и сборка</h1>

                <x-store.nav-tabs
                    :navs="$navs"
                ></x-store.nav-tabs>

            </div>
        </section>
    </x-slot:positionTop>

    <div class="text-gray-600 font-light">
        <h2 class="text-2xl mb-8">Доставка мебели</h2>

        <p class="mb-4">
            Компания «COMPANY_INFO» организует доставку мебели в строго согласованные сроки. При заказе доставки товара
            без разгрузки мебель доставляется строго до подъезда заказчика.
        </p>


        <div class="overflow-x-auto relative mb-4">
            <table class="w-full text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="py-3 px-6 rounded-l-lg">
                        Вес груза
                    </th>
                    <th scope="col" class="py-3 px-6 rounded-r-lg">
                        Стоимость
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white">
                    <th scope="row" class="py-4 px-6 font-light whitespace-nowrap">
                        Менее 100 кг
                    </th>
                    <td class="py-4 px-6 font-medium text-gray-900 ">
                        500 рублей
                    </td>
                </tr>
                <tr class="bg-white">
                    <th scope="row" class="py-4 px-6 font-light whitespace-nowrap">
                        Более 100 кг
                    </th>
                    <td class="py-4 px-6 font-medium text-gray-900 ">
                        1500 рублей за каждые 1500 кг
                    </td>
                </tr>
            </table>
        </div>

        <p class="border rounded border-red-600 text-center p-2 mb-4">
            Минимальная стоимость разгрузки и подъёма на этаж - 500 руб.
        </p>

        <p class="mb-4">Усложненные работы по разгрузке, такие как такелаж, негабаритная мебель, сейфы и пр. могут быть
            рассчитаны
            менеджерами компании по отдельному тарифу.</p>

        <hr class="my-6 py-3">

        <h2 class="text-2xl mb-8">Разгрузка</h2>

        <p class="mb-4">
            Разгрузка и подъём на этаж составляет:
        </p>


        <div class="overflow-x-auto relative mb-4">
            <table class="w-full text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="py-3 px-6 rounded-l-lg">
                        Без грузового лифта
                    </th>
                    <th scope="col" class="py-3 px-6 rounded-r-lg">
                        С грузовым лифтом
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white">
                    <th scope="row" class="py-4 px-6 font-light whitespace-nowrap">
                        2 рубля за килограмм/этаж
                    </th>
                    <td class="py-4 px-6 font-medium text-gray-900 ">
                        2 рубля за килограмм
                    </td>
                </tr>
            </table>
        </div>

        <p class="mb-4">
            Со стороны Заказчика ответственный сотрудник должен обеспечить в согласованное время встречу и сопровождение
            транспорта к месту разгрузки. Так же необходим беспрепятственный проход грузчиков к месту доставки. В случае
            сборки мебели силами нашей компании, важно подготовить помещение для осуществления сборки и установки
            мебели.
            <br>
            <br>
            На любые возникающие вопросы наши менеджеры готовы дать исчерпывающие ответы и оказать всяческое содействие в случае возникновения проблем.
        </p>

        <hr class="my-6 py-3">

        <h2 class="text-2xl mb-8">Сборка</h2>

        <p class="mb-4">
            Сборка мебели осуществляется нашими сотрудниками не ранее следующего дня после осуществления доставки.
        </p>


        <div class="overflow-x-auto relative mb-4">
            <table class="w-full text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="py-3 px-6 rounded-l-lg">
                        Стоимость товаров в заказе
                    </th>
                    <th scope="col" class="py-3 px-6 rounded-r-lg">
                        С грузовым лифтом
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white">
                    <th scope="row" class="py-4 px-6 font-light whitespace-nowrap">
                        До 100 000 рублей
                    </th>
                    <td class="py-4 px-6 font-medium text-gray-900 ">
                        7% от общей стоимости товаров
                    </td>
                </tr>
                <tr class="bg-white">
                    <th scope="row" class="py-4 px-6 font-light whitespace-nowrap">
                        От 100 000 до 200 000 рублей
                    </th>
                    <td class="py-4 px-6 font-medium text-gray-900 ">
                        6% от общей стоимости товаров
                    </td>
                </tr>
                <tr class="bg-white">
                    <th scope="row" class="py-4 px-6 font-light whitespace-nowrap">
                        Свыше 200 000 рублей
                    </th>
                    <td class="py-4 px-6 font-medium text-gray-900 ">
                        5% от общей стоимости товаров
                    </td>
                </tr>
            </table>
        </div>
        <p class="border rounded border-red-600 text-center p-2 mb-4">
            Минимальная стоимость сборки 1600 руб.
        </p>

        <p class="mb-4">
            *Цены на услуги на сайте не являются публичной офертой
        </p>
    </div>

</x-layouts.store>
