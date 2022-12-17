@props([
    'id' => '',
    'errorName' => '',
    'label' => '',
    'placeholder' => '',
])

@if( $label )
    <x-admin.label for="{{ $id }}">{{ $label }}</x-admin.label>
@endif
<textarea class="form-control @error( $errorName ) is-invalid @enderror"
          @if( $id )
          id="{{ $id }}"
          @endif
          @if( $placeholder || $label)
          placeholder="{{ $label ?: $placeholder }}"
          @endif
    {{ $attributes }}
></textarea>
@error( $errorName )
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror

