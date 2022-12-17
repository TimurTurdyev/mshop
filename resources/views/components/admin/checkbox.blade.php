@props([
    'errorName' => '',
])

<label class="form-check @error($errorName) is-invalid @enderror">
    <input class="form-check-input" type="checkbox" {{ $attributes }}>
    @if( $slot )
        <span class="form-check-label">
        {{ $slot }}
	    </span>
    @endif
</label>
@error( $errorName )
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror



