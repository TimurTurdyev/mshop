<div class="row">
    <div class="col-md-8">
        <div class="mb-3">
            <x-admin.input
                id="storeName"
                label="Название"
                errorName="store.site_name"
                wire:model="store.site_name"
            ></x-admin.input>
        </div>
        <div class="mb-3">
            <x-admin.input
                id="storePhone"
                label="Телефон"
                errorName="store.phone"
                wire:model="store.phone"
            ></x-admin.input>
        </div>
        <div class="mb-3">
            <x-admin.textarea
                id="storeAddress"
                label="Адрес"
                errorName="store.address"
                wire:model="store.address"
            ></x-admin.textarea>
        </div>
        <div class="mb-3">
            <x-admin.switcher
                id="storeStatus"
                label="Статус"
                errorName="store.site_active"
                wire:model="store.site_active"
            ></x-admin.switcher>
        </div>
    </div>
</div>
