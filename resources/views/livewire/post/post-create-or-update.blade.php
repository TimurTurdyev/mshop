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
                            id="postName"
                            label="Название"
                            errorName="post.name"
                            placeholder="Название"
                            wire:model="post.name"
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
                        <x-admin.textarea
                            id="postPreview"
                            label="Превью"
                            errorName="post.preview"
                            placeholder="Превью"
                            wire:model="post.preview"
                        ></x-admin.textarea>
                    </div>

                    <div class="mb-3">
                        <x-admin.image
                            id="postImage"
                            label="Изображение"
                            :value="$post['image']"
                            errorName="post.image"
                            wire:model="post.image"
                        ></x-admin.image>
                    </div>

                    <x-admin.editor
                        id="pageTextHtml"
                        label="Описание"
                        errorName="page.text_html"
                        :value="$page['text_html']"
                        wire:model.debounce.500ms="page.text_html"
                    ></x-admin.editor>
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
                            id="postSlug"
                            label="Сео урл"
                            errorName="post.slug"
                            wire:model="post.slug"
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
                            id="postStatus"
                            label="Статус"
                            errorName="post.status"
                            wire:model="post.status"
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
