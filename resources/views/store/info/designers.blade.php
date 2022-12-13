<x-layouts.store>
    <x-slot:meta>
        <x-store.meta
            title="Дизайнерам и архитекторам"
            description="Дизайнерам и архитекторам"
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
                            <span class="text-gray-400">Дизайнерам и архитекторам</span>
                        </li>
                    </ol>
                </nav>

                <h1 class="text-3xl mb-8">Дизайнерам и архитекторам</h1>

                <x-store.nav-tabs
                    :navs="$navs"
                ></x-store.nav-tabs>

            </div>
        </section>
    </x-slot:positionTop>

    <div class="text-gray-600 font-light">
        <p class="mb-4">
            Компания «COMPANY_INFO» приглашает к долгосрочному взаимовыгодному сотрудничеству талантливых творческих
            людей для совместного воплощения смелых идей и реализации инновационных проектов любой сложности. Мы
            работаем с частным дизайнерами, дизайн-студиями, архитекторами и архитектурными бюро, занимающимися дизайном
            интерьеров.
        </p>
        <div class="bg-gray-50 border border-transparent overflow-hidden rounded-md mb-8">
            <div class="relative flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    <img src="{{ asset('dist/images/info-designers.jpg') }}"
                         class="h-full w-full object-cover object-center"
                         alt="">
                </div>
                <div class="md:flex-1 md:order-first py-20 px-8">
                    <h3 class="text-3xl mb-4">
                        Более 80 000 <br>
                        наименований <br>
                        современной мебели и <br>
                        аксессуаров для <br>
                        реализации Ваших идей
                    </h3>
                    <p class="text-xl font-light mb-8">
                        Для тех, кто занимается проектированием или оформлением офисных пространств, кабинетов
                        руководителей, хостелов, отелей или коворкингов
                    </p>
                </div>
            </div>
        </div>
        <p class="mb-4">
            Благодаря, оптимизированной логистике, наличию складов в Москве и регионах, мы обеспечиваем стабильные сроки
            поставки и обширный ассортимент продукции. Наши сотрудники организуют доставку мебели на объекты точно в
            согласованные сроки и обеспечивают сервисы разгрузки и сборки.
            <br><br>
            Любые смелые идеи, нетривиальные задачи и, сложные проекты, требующие профессионального подхода и
            углубленной проработки - наша область компетенции. Условия сотрудничества, которые мы предлагаем -
            взаимовыгодные, гибкие, и хорошо вписывающиеся в современные рыночные условия. Нашим партнёрам мы
            гарантируем высокое вознаграждение, и индивидуальный подход. В рамках нашего партнёрства мы сможем воплощать
            сложные и нестандартные идеи в лучшие интерьеры, и задавать новые модные тренды в области организации
            рабочих пространств для бизнеса!
        </p>
    </div>

</x-layouts.store>
