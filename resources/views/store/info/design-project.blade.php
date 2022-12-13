<x-layouts.store>
    <x-slot:meta>
        <x-store.meta
            title="Дизайн проект"
            description="Дизайн проект"
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
                            <span class="text-gray-400">Дизайн проект</span>
                        </li>
                    </ol>
                </nav>

                <h1 class="text-3xl mb-8">Дизайн проект</h1>

                <x-store.nav-tabs
                    :navs="$navs"
                ></x-store.nav-tabs>

            </div>
        </section>
    </x-slot:positionTop>

    <div class="text-gray-600 font-light">
        <p class="mb-8">
            «COMPANY_INFO» продает готовые комплекты мебели для офисов и выполняет разработку индивидуального
            дизайн-проекта. Планирование позволяет учесть особенности помещений, снизить издержки, учесть задачи каждого
            сотрудника, а также общую корпоративную концепцию менеджмента. Заказывая дизайн-проект, вы можете сделать
            офис более емким, эргономичным и стильным даже при небольшом бюджете.
            <br><br>
            Обязательно составляется спецификация с указанием материалов, цвета, типа предметов, их количества,
            планировочные решения в разных ракурсах. Также указывается тип фасадов, тип фрезеровки, тип стекла, ручек,
            фурнитуры.
        </p>

        <div class="relative flex flex-col md:flex-row space-x-4 mb-8">
            <a class="w-full flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row">
                <div class="w-full flex flex-col justify-between p-4 leading-normal">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900">Визуализация</h5>
                </div>
                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:rounded-none md:rounded-l-lg"
                     src="{{ asset('dist/images/info-design-project-1.png') }}" alt="">
            </a>
            <a class="w-full flex flex-col items-center bg-white border rounded-lg shadow-md md:flex-row">
                <div class="w-full flex flex-col justify-between p-4 leading-normal">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900">Расстановка</h5>
                </div>
                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:rounded-none md:rounded-l-lg"
                     src="{{ asset('dist/images/info-design-project-2.png') }}" alt="">
            </a>
        </div>

        <h2 class="text-2xl mb-8">Что входит в проект</h2>
        <p class="mb-4">
            В процессе подготовки дизайн-проекта расстановки мебели в офисе специалисты готовят эскизы от руки или с
            помощью графических редакторов. Проект подразумевает детализацию размеров, конфигурации шкафов, расстановку
            в пространстве.
            <br><br>
            Обязательно составляется спецификация с указанием материалов, цвета, типа предметов, их количества,
            планировочные решения в разных ракурсах. Также указывается тип фасадов, тип фрезеровки, тип стекла, ручек,
            фурнитуры.
        </p>

        <div class="bg-gray-50 border border-transparent overflow-hidden rounded-md mb-8">
            <div class="relative flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    <img src="{{ asset('dist/images/info-design-project-3.jpg') }}"
                         class="h-full w-full object-cover object-center"
                         alt="">
                </div>
                <div class="md:flex-1 md:order-first py-20 px-8">
                    <h3 class="text-3xl mb-4">
                        При подготовке дизайн-проекта учитываются:
                    </h3>
                    <ul class="space-y-4 list-disc list-inside font-light mb-8">
                        <li>Эстетика – выбор стиля и определение основных предпочтений заказчика.</li>
                        <li>Эргономика, композиция, конфигурация.</li>
                        <li>Бюджет и исходные данные – загруженность производства, планируемые затраты заказчика,
                            возможности размещения в требуемом помещении.
                        </li>
                        <li>Современные тренды, предложения конкурентов.</li>
                        <li>Геометрия и цвет мебели в соответствии с выбранными технологиями и материалами.</li>
                    </ul>
                </div>
            </div>
        </div>
        <p class="mb-4">
            В результате вы получаете готовый визуальный ряд с проектом расстановки мебели, который поможет оценить
            будущее переоснащение рабочего пространства. После согласования проект будет передан на производство, сроки
            исполнения фиксируется договором.
        </p>
    </div>

</x-layouts.store>
