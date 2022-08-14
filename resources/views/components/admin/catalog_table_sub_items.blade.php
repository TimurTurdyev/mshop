@props(['parent' => '', 'item' => []])

<tr>
    <th scope="row">{{ $item->id }}</th>
    <td>{{ $item->name }}</td>
    <td>{{ $parent }}{{ $item->page->slug }}</td>
    <td>{{ $item->status ? 'Вкл' : 'Выкл' }}</td>
    <td>{{ $item->created_at }}</td>
    <td>{{ $item->updated_at }}</td>
    <td class="table-action">
        <a href="{{ route('admin.catalog.edit', $item->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
        <a wire:click.prevent="delete({{ $item->id }})"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
    </td>
</tr>
@foreach( $item->children as $child )
    <x-admin.catalog_table_sub_items :item="$child" :parent="$parent . $item->page->slug . '/'"></x-admin.catalog_table_sub_items>
@endforeach
