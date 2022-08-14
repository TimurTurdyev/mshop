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
                        <x-admin.input id="catalogName" label="Название категории" name="catalog.name" placeholder="Название категории"></x-admin.input>
                    </div>

                    <div class="mb-3">
                        <x-admin.switcher id="catalogStatus" label="Статус" name="catalog.status"></x-admin.switcher>
                    </div>

                    <x-admin.editor id="pageTextHtml" label="Описание" name="page.text_html" :value="$page['text_html']"></x-admin.editor>
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
                        <x-admin.select id="catalogParentId" label="Родительская категория" name="catalog.parent_id" :items="$catalogs"></x-admin.select>
                    </div>

                    <div class="mb-3">
                        <x-admin.input id="pageSlug" label="Сео урл" name="page.slug"></x-admin.input>
                    </div>

                    <div class="mb-3">
                        <x-admin.input id="pageMetaTitle" label="Мета заголовок" name="page.meta_title"></x-admin.input>
                    </div>

                    <div class="mb-3">
                        <x-admin.textarea id="pageMetaDescription" label="Мета описание" name="page.meta_description"></x-admin.textarea>
                    </div>

                    <div class="mb-3">
                        <x-admin.textarea id="pageMetaKeyword" label="Мета ключи" name="page.meta_keyword"></x-admin.textarea>
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
