<div>
    <x-slot:title>Редактрование</x-slot:title>
    <h1 class="h3 mb-3">Редактрование</h1>
    <form class="row" wire:submit.prevent="save">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Основное</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <x-admin.input
                            id="collectionName"
                            label="Название товара"
                            name="collection.name"
                            wire:model="collection.name"
                        ></x-admin.input>
                    </div>

                    <div class="mb-3">
                        <x-admin.switcher
                            id="collectionStatus"
                            label="Статус"
                            name="collection.status"
                            wire:model="collection.status"
                        ></x-admin.switcher>
                    </div>
                    <div class="mb-3">
                        <x-admin.editor
                            id="pageTextHtml"
                            label="Описание"
                            :value="$page['text_html']"
                            name="page.text_html"
                            wire:model="page.text_html"
                        ></x-admin.editor>
                    </div>
                    <div class="row">
                        @foreach( $images as $key => $image )
                            <div class="col-md-4 mb-3">
                                <x-admin.image
                                    id="collectionImages{{ $key }}"
                                    :value="$image"
                                    name="images.{{ $key }}"
                                    wire:model="images.{{ $key }}"
                                ></x-admin.image>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-success" wire:click.prevent="addImage">Добавить фото</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Дополнительно</h5>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <livewire:collection.collection-to-catalog
                            :selected_catalogs="$selected_catalogs"></livewire:collection.collection-to-catalog>
                    </div>

                    <div class="mb-3">
                        <x-admin.input
                            id="pageSlug"
                            label="Сео урл"
                            name="collection.slug"
                            wire:model="collection.slug"
                        ></x-admin.input>
                    </div>

                    <div class="mb-3">
                        <x-admin.input
                            id="pageMetaTitle"
                            label="Мета заголовок"
                            name="page.meta_title"
                            wire:model="page.meta_title"
                        ></x-admin.input>
                    </div>

                    <div class="mb-3">
                        <x-admin.textarea
                            id="pageMetaDescription"
                            label="Мета описание"
                            name="page.meta_description"
                            wire:model="page.meta_description"
                        ></x-admin.textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </form>
    @if( $collection->exists )
        <livewire:collection.collection-property-list :collection="$collection"></livewire:collection.collection-property-list>
    @endif
</div>

@push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush
