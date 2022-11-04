<div class="row">
    <div class="col-md-8">
        <div class="mb-3">
            <x-admin.input
                id="storePhone"
                label="Телефон"
                name="store.phone"
                wire:model="store.phone"
            ></x-admin.input>
        </div>
        <div class="mb-3">
            <x-admin.textarea
                id="storeAddress"
                label="Адрес"
                name="store.address"
                wire:model="store.address"
            ></x-admin.textarea>
        </div>

        <div class="mb-3">
            <x-admin.input
                id="storeTitle"
                label="Заголовок"
                name="store.title"
                wire:model="store.title"
            ></x-admin.input>
        </div>
        <div class="mb-3">
            <x-admin.textarea
                id="storeMetaDescription"
                label="Мета описание"
                name="store.meta_description"
                wire:model="store.meta_description"
            ></x-admin.textarea>
        </div>
    </div>
</div>
