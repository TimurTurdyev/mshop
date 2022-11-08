@props([
    'id' => '',
    'name' => '',
    'label' => '',
])


<div class="form-check form-switch">
    <input class="form-check-input @error('catalog.status') is-invalid @enderror"
           type="checkbox"
           @if( $id )
           id="{{ $id }}"
           @endif
        {{ $attributes }}
    >
    @if( $label )
        <x-admin.label for="{{ $id }}" class="form-check-label">{{ $label }}</x-admin.label>
    @endif
    @error( $name )
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>



