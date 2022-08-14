<div>
    @push('styles')
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @endpush
    @push('scripts')
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    @endpush
    <form wire:submit.prevent="save">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Описание</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 bg-white @error('page.text_html') is-invalid @enderror" wire:ignore>
                            <label class="form-label">Описание</label>
                            <div
                                style="min-height: 350px;"
                                x-data
                                x-ref="quillEditor"
                                x-init="quill = new Quill($refs.quillEditor, {theme: 'snow'});
                                quill.on('text-change', function () {
                                    $dispatch('input', quill.root.innerHTML);
                                });"
                                wire:model.debounce.200ms="page.text_html"
                            >
                                {!! $page['text_html'] !!}
                            </div>
                            @error('page.text_html')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">

                </div>
            </div>
        </div>
    </form>
</div>
