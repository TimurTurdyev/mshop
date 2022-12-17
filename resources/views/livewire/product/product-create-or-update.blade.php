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
                            id="productName"
                            label="Название товара"
                            errorName="product.name"
                            wire:model="product.name"
                        ></x-admin.input>
                    </div>

                    <div class="mb-3">
                        <x-admin.input
                            id="pageHeading"
                            label="Заголовок"
                            errorName="page.heading"
                            wire:model="page.heading"
                        ></x-admin.input>
                    </div>

                    <div class="mb-3">
                        <x-admin.editor
                            id="pageTextHtml"
                            label="Описание"
                            :value="$page['text_html']"
                            errorName="page.text_html"
                            wire:model="page.text_html"
                        ></x-admin.editor>
                    </div>
                    <div class="row">
                        @foreach( $images as $key => $image )
                            <div class="col-md-4 mb-3">
                                <x-admin.image
                                    id="productImages{{ $key }}"
                                    :value="$image"
                                    errorName="images.{{ $key }}"
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
                        <x-admin.select
                            id="productBrandId"
                            label="Производитель"
                            errorName="product.brand_id"
                            :items="$brands"
                            wire:model="product.brand_id"
                        ></x-admin.select>
                    </div>

                    <div class="mb-3">
                        <x-admin.select
                            id="productGroupId"
                            label="Группа товара"
                            errorName="product.group_id"
                            :items="$groups"
                            wire:model="product.group_id"
                        ></x-admin.select>
                    </div>

                    <div class="mb-3">
                        <x-admin.select
                            id="productCollectionId"
                            label="Коллекция товара"
                            errorName="product.collection_id"
                            :items="$collections"
                            wire:model="product.collection_id"
                        ></x-admin.select>
                    </div>

                    <div class="mb-3">
                        <livewire:share.entity-to-catalog
                            :selected_catalogs="$selected_catalogs"></livewire:share.entity-to-catalog>
                    </div>

                    <div class="mb-3">
                        <x-admin.input
                            id="pageSlug"
                            label="Сео урл"
                            errorName="product.slug"
                            wire:model="product.slug"
                        ></x-admin.input>
                    </div>

                    <div class="mb-3">
                        <x-admin.input
                            id="pageMetaTitle"
                            label="Мета заголовок"
                            errorName="page.meta_title"
                            wire:model="page.meta_title"
                        ></x-admin.input>
                    </div>

                    <div class="mb-3">
                        <x-admin.textarea
                            id="pageMetaDescription"
                            label="Мета описание"
                            errorName="page.meta_description"
                            wire:model="page.meta_description"
                        ></x-admin.textarea>
                    </div>

                    <div class="mb-3">
                        <x-admin.image
                            id="pageMetaImage"
                            label="Мета изображение"
                            :value="$page['meta_image']"
                            errorName="page.meta_image"
                            wire:model="page.meta_image"
                        ></x-admin.image>
                    </div>

                    <div class="mb-3">
                        <x-admin.switcher
                            id="productStatus"
                            label="Статус"
                            errorName="product.status"
                            wire:model="product.status"
                        ></x-admin.switcher>
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </form>
    @if( $product->exists )
        <livewire:product.price-list :product="$product"></livewire:product.price-list>
    @endif
</div>

@push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush
