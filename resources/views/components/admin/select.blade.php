@props([
    'id' => '',
    'name' => '',
    'label' => '',
    'items' => [],
])

@if( $label )
    <x-admin.label :for="$id" :name="$label"></x-admin.label>
@endif

<select class="form-control @error( $name ) is-invalid @enderror"
        @if( $id )
        id="{{ $id }}"
        @endif
        wire:model="{{ $name }}"
>
    <option>-- Не выбран --</option>
    @foreach( $items as $item )
        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
    @endforeach
</select>

@error( $name )
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror

