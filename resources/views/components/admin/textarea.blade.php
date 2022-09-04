@props([
    'id' => '',
    'name' => '',
    'label' => '',
    'placeholder' => '',
])

@if( $label )
    <x-admin.label :for="$id" :name="$label"></x-admin.label>
@endif
<textarea class="form-control @error( $name ) is-invalid @enderror"
          @if( $id )
          id="{{ $id }}"
          @endif
          @if( $placeholder || $label)
          placeholder="{{ $label ?: $placeholder }}"
          @endif
    {{ $attributes }}
></textarea>
@error( $name )
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror

