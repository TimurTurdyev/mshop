<x-layouts.store>
    <x-slot:meta>
        <x-store.meta
            title=""
            description=""
            url="{{ route('home') }}"
            image=""
        ></x-store.meta>
    </x-slot:meta>

    <x-slot:positionTop>
        <section class="bg-gray-50">
            <div class="container px-4 mx-auto py-10">
                <div class="flex flex-col md:flex-row -mx-4">
                    <div class="md:flex-1 px-4">
                        <img src="{{ asset('/dist/images/call-specialist-block.jpg') }}"
                             class="h-full w-full object-cover object-center"
                        >
                    </div>
                    <div class="md:flex-1 px-4 py-10 md:order-first">
                        <h3 class="text-3xl mb-10">Вызов специалиста в офис</h3>

                        <p class="text-xl font-light mb-6">
                            Заполните форму и в течении 5 минут с Вами свяжется наш менеджер для уточнения даты и времени замера
                            помещения
                        </p>
                        <div class="max-w-sm">
                            <livewire:store.share.call-specialist></livewire:store.share.call-specialist>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-slot:positionTop>

    <x-slot:callSpecialist>
        <x-store.call-specialist-block></x-store.call-specialist-block>
    </x-slot:callSpecialist>
</x-layouts.store>
