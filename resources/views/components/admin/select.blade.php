@props([
    'id' => '',
    'errorName' => '',
    'label' => '',
    'items' => [],
    'key' => 'name',
    'start_empty' => 'yes'
])

@if( $label )
    <x-admin.label :for="$id">{{ $label }}</x-admin.label>
@endif

<select class="form-control @error( $errorName ) is-invalid @enderror"
        @if( $id )
            id="{{ $id }}"
    @endif
    {{ $attributes }}
>
    @if( $start_empty == 'yes' )
        <option>-- Не выбран --</option>
    @endif
    @foreach( $items as $item )
        <option value="{{ $item['id'] }}">{{ $item[$key] }}</option>
    @endforeach
</select>

@error( $errorName )
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror

