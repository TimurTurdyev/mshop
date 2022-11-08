@props([
    'name' => '',
])

<label class="form-check @error($name) is-invalid @enderror">
    <input class="form-check-input" type="checkbox" {{ $attributes }}>
    @if( $slot )
        <span class="form-check-label">
        {{ $slot }}
	    </span>
    @endif
</label>
@error( $name )
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror



