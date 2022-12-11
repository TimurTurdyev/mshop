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
                            id="projectName"
                            label="Название"
                            name="project.name"
                            placeholder="Название"
                            wire:model="project.name"
                        ></x-admin.input>
                    </div>

                    <div class="mb-3">
                        <x-admin.input
                            id="projectCompany"
                            label="Компания"
                            name="project.company"
                            placeholder="Компания"
                            wire:model="project.company"
                        ></x-admin.input>
                    </div>

                    <div class="mb-3">
                        <x-admin.input
                            id="pageHeading"
                            label="Заголовок"
                            name="page.heading"
                            wire:model="page.heading"
                        ></x-admin.input>
                    </div>

                    <div class="mb-3">
                        <x-admin.textarea
                            id="projectPreview"
                            label="Превью"
                            name="project.preview"
                            placeholder="Превью"
                            wire:model="project.preview"
                        ></x-admin.textarea>
                    </div>

                    <div class="mb-3">
                        <x-admin.image
                            id="projectImage"
                            label="Изображение"
                            :value="$project['image']"
                            name="project.image"
                            wire:model="project.image"
                        ></x-admin.image>
                    </div>

                    <label class="mb-2">Галерея</label>
                    <div class="row">
                        @foreach( $images as $key => $image )
                            <div class="col-md-4 mb-3">
                                <x-admin.image
                                    id="productImages{{ $key }}"
                                    :value="$image"
                                    name="images.{{ $key }}"
                                    wire:model="images.{{ $key }}"
                                ></x-admin.image>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-success" wire:click.prevent="addImage">Добавить фото</button>

                    <div class="mt-3">
                        <x-admin.editor
                            id="pageTextHtml"
                            label="Описание"
                            name="page.text_html"
                            :value="$page['text_html']"
                            wire:model.debounce.500ms="page.text_html"
                        ></x-admin.editor>
                    </div>
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
                        <x-admin.input
                            id="projectSlug"
                            label="Сео урл"
                            name="project.slug"
                            wire:model="project.slug"
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

                    <div class="mb-3">
                        <x-admin.image
                            id="pageMetaImage"
                            label="Мета изображение"
                            :value="$page['meta_image']"
                            name="page.meta_image"
                            wire:model="page.meta_image"
                        ></x-admin.image>
                    </div>

                    <div class="mb-3">
                        <x-admin.switcher
                            id="projectStatus"
                            label="Статус"
                            name="project.status"
                            wire:model="project.status"
                        ></x-admin.switcher>
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </form>
</div>

@push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush
