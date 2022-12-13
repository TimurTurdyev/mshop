<x-layouts.store>
    <x-slot:meta>
        <x-store.meta
            title="Госзаказчикам"
            description="Госзаказчикам"
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
                            <span class="text-gray-400">Госзаказчикам</span>
                        </li>
                    </ol>
                </nav>

                <h1 class="text-3xl mb-8">Госзаказчикам</h1>

                <x-store.nav-tabs
                    :navs="$navs"
                ></x-store.nav-tabs>

            </div>
        </section>
    </x-slot:positionTop>

    <div class="text-gray-600 font-light">
        <p class="border rounded border-red-600 text-center p-2 mb-8">
            Мы делаем закупки офисной мебели для госзаказчиков комфортными, выгодными и современными!
        </p>
        <p class="mb-8">
            Специально для государственных учреждений и коммерческих структур, осуществляющих закупки путем проведения
            тендеров (в том числе по ФЗ-44 и ФЗ-223), в нашей компании работает тендерный отдел.
        </p>

        <div class="bg-gray-50 border border-transparent overflow-hidden rounded-md mb-8">
            <div class="relative flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 py-20 px-8 bg-red-600 text-white">
                    <p>
                        Вы можете связаться со специалистами тендерного отдела или отправить свой запрос следующими
                        способами:
                        <br><br>
                        по Телефону<br>
                        <span class="text-2xl">{{ $phone }}</span>
                        <br><br>
                        по Электронной почте
                        <br>
                        <span class="text-2xl">{{ $email }}</span>
                    </p>
                </div>
                <div class="md:flex-1 md:order-first py-20 px-8">
                    <h3 class="text-3xl mb-4">
                        Если вам необходимо:
                    </h3>
                    <ul class="space-y-4 list-disc list-inside font-light mb-8">
                        <li>
                            получить коммерческое предложение для определения НМЦК;
                        </li>
                        <li>
                            получить помощь в подготовке документации для выхода на тендерную площадку;
                        </li>
                        <li>
                            получить характеристики товара для технического задания;
                        </li>
                        <li>
                            заключить договор на поставку товара по счёту;
                        </li>
                        <li>
                            пригласить к участию в тендере.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-layouts.store>
