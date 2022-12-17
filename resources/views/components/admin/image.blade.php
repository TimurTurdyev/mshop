@props([
    'id' => '',
    'errorName' => '',
    'value' => '',
    'label' => '',
])

@if( $label )
    <x-admin.label for="{{ $id }}">{{ $label }}</x-admin.label>
@endif
@if( $value )
    <img src="{{ asset($value) }}" class="img-fluid mb-3">
@endif

<div class="input-group @error( $errorName ) is-invalid @enderror">
    <input type="text"
           class="form-control"
           id="feature_image{{ $id }}"
        {{ $attributes }}
    >
    <button type="button"
            class="btn btn-secondary popup_selector"
            data-inputid="feature_image{{ $id }}"
    >Изменить
    </button>
</div>
@error( $errorName )
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror

