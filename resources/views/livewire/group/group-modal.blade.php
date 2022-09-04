<div>
    <div class="mb-3">
        <x-admin.input
            id="groupName"
            label="Название категории"
            name="group.name"
            wire:model="group.name"
        ></x-admin.input>
    </div>

    <div class="mb-3">
        <x-admin.switcher
            id="groupStatus"
            label="Статус"
            name="group.status"
            wire:model="group.status"
        ></x-admin.switcher>
    </div>
    <button type="button" class="btn btn-primary" wire:click.prevent="save">Сохранить</button>
</div>
