@props([
    'name' => '',
    'for' => '',
])

@if( $name )
    <label class="form-label" {{ $for ? "for={$for}" : '' }}>{{ $name }}</label>
@endif
