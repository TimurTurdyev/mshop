<div>
    <x-slot:title>Редактрование</x-slot:title>
    <h1 class="h3 mb-3">Редактрование</h1>
    <form wire:submit.prevent="save">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <x-admin.input
                        id="optionAdminName"
                        label="Название группы опций / Для админа"
                        name="option.group_admin"
                        wire:model="option.group_admin"
                    ></x-admin.input>
                </div>
                <div class="mb-3">
                    <x-admin.input
                        id="optionSiteName"
                        label="Название группы опций / На сайте"
                        name="option.group_site"
                        wire:model="option.group_site"
                    ></x-admin.input>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>

    @if( $option->exists )
        <livewire:option.option-value-list :option="$option"></livewire:option.option-value-list>
    @endif
</div>
