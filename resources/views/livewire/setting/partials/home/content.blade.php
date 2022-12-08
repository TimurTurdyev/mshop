<div class="row">
    <div class="col-md-8">
        <div class="mb-3">
            <x-admin.input
                id="heading"
                label="Заголовок"
                wire:model="setting.heading"
            ></x-admin.input>
        </div>
        <div class="mb-3">
            <x-admin.editor
                id="text"
                label="Описание"
                :value="$setting['text']"
                wire:model.debounce.500ms="setting.text"
            ></x-admin.editor>
        </div>
    </div>
</div>
