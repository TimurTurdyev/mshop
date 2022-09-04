@props([
    'label' => '',
    'name' => '',
    'value' => '',
])

<div class="bg-white" wire:ignore>
    @if( $label )
        <label class="form-label">{{ $label }}</label>
    @endif
    <div
        style="min-height: 350px;"
        x-data
        x-ref="quillEditor"
        x-init="quill = new Quill($refs.quillEditor, {theme: 'snow'}); quill.on('text-change', function () { $dispatch('input', quill.root.innerHTML); });"
        {{ $attributes }}
    >
        {!! $value !!}
    </div>
    @error( $name )
    <div class="is-invalid"></div>
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
