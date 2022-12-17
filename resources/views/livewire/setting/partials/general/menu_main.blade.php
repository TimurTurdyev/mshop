<table class="table table-striped">
    <thead>
    <tr>
        <th style="width: 2%">#</th>
        <th style="width:30%;">Иконка</th>
        <th style="width:50%;">Ссылка</th>
        <th style="width:40%">Название</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody>
    @foreach( $store['menu_main'] as $menu )
        <tr>
            <td>{{ $loop->index }}</td>
            <td>
                <x-admin.textarea
                    errorName="store.menu_main.{{ $loop->index }}.icon"
                    wire:model="store.menu_main.{{ $loop->index }}.icon"
                ></x-admin.textarea>
            </td>
            <td>
                <x-admin.input
                    errorName="store.menu_main.{{ $loop->index }}.link"
                    wire:model="store.menu_main.{{ $loop->index }}.link"
                ></x-admin.input>
            </td>
            <td>
                <x-admin.input
                    errorName="store.menu_main.{{ $loop->index }}.title"
                    wire:model="store.menu_main.{{ $loop->index }}.title"
                ></x-admin.input>
            </td>
            <td class="table-action">
                <a href="#" wire:click.prevent="removeMenuItem('menu_main.{{ $loop->index }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-trash align-middle">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path
                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    </svg>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<button type="button" class="btn btn-primary" wire:click.prevent="addMenuItem('menu_main')">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
         fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round"
         stroke-linejoin="round"
         class="feather feather-plus align-middle">
        <line x1="12" y1="5" x2="12" y2="19"></line>
        <line x1="5" y1="12" x2="19" y2="12"></line>
    </svg>
</button>
