<div>
    <div class="mb-3">
        <x-admin.input
            id="optionValueAdminName"
            label="Значение опции в админке"
            name="optionValue.value_admin"
            wire:model="optionValue.value_admin"
        ></x-admin.input>
    </div>

    <div class="mb-3">
        <x-admin.input
            id="optionValueName"
            label="Значение опции"
            name="optionValue.value"
            wire:model="optionValue.value"
        ></x-admin.input>
    </div>

    <div class="mb-3">
        <x-admin.image
            id="optionValueId"
            label="Картинка опции"
            :value="$optionValue->image"
            name="optionValue.image"
            wire:model="optionValue.image"
        ></x-admin.image>
    </div>
    <button type="button" class="btn btn-primary" wire:click.prevent="save">Сохранить</button>
</div>
