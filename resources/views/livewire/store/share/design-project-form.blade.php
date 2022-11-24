<div>
    <x-store.slide-popup>
        <x-slot:title>Форма заявки</x-slot:title>
        <x-slot:event_toggle_open>design-project</x-slot:event_toggle_open>

        <p class="mt-0.5 text-sm text-gray-500 mb-8">
            Заполните форму и в течение 5 минут с Вами свяжется
            специалист для уточнения всех деталей заказа.</p>
        <livewire:store.share.call-form
            showEmail="true"
            emitName="design_project"
            buttonTitle="Вызвать специалиста"
        ></livewire:store.share.call-form>
    </x-store.slide-popup>
</div>
