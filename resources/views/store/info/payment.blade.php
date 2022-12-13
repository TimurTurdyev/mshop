<x-layouts.store>
    <x-slot:meta>
        <x-store.meta
            title="Оплата"
            description="Оплата"
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
                            <span class="text-gray-400">Оплата</span>
                        </li>
                    </ol>
                </nav>

                <h1 class="text-3xl mb-8">Оплата</h1>

                <x-store.nav-tabs
                    :navs="$navs"
                ></x-store.nav-tabs>

            </div>
        </section>
    </x-slot:positionTop>

    <div class="text-gray-600 font-light">
        <p class="border rounded border-red-600 text-center p-2 mb-8">
            Наша компания работает с НДС, не взимает никаких комиссий и дополнительных наценок!
        </p>

        <p class="mb-4">
            Все товары и услуги оплачиваются по безналичному расчету, путём перечисления денежных средств на расчетный
            счет ООО «COMPANY_INFO».
            <br><br>
            Платежи включают в себя НДС 20%
            <br><br>
            После формирования заказа и подтверждения менеджером компании «COMPANY_INFO», Заказчику выставляется счет с
            реквизитами и исчерпывающей информацией по оплате.
            <br><br>
            Все возникающие вопросы по оплате, доставке, включению в счет дополнительных услуг по доставке, разгрузке и
            сборке согласовываются непосредственно с ответственным менеджером нашей компании.
        </p>
    </div>

</x-layouts.store>
