<div class="row">
    <div class="col-md-8">
        <div class="mb-3">
            <x-admin.textarea
                id="meta_title"
                label="Тайтл"
                wire:model="setting.meta_title"
            ></x-admin.textarea>
        </div>
        <div class="mb-3">
            <x-admin.textarea
                id="meta_description"
                label="Описание"
                wire:model="setting.meta_description"
            ></x-admin.textarea>
        </div>
    </div>
    <div class="col-md-4">
        <x-admin.image
            id="meta_image"
            label="Изображение"
            value="{{ $setting['meta_image'] }}"
            wire:model="settings.meta_image"
        ></x-admin.image>
    </div>
</div>
