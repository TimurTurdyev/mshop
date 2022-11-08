<div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Список значений</h5>
                </div>
                <div class="card-body">
                    @if( !$optionValues->count() )
                        <p class="lead">Пусто...</p>
                    @else
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Значение для админа</th>
                                    <th scope="col">Значение</th>
                                    <th scope="col">Картинка</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $optionValues as $item )
                                    <tr>
                                        <th scope="row">
                                            <x-admin.checkbox
                                                id="{{ $item->id }}"
                                                wire:model="option_value_idx"
                                                value="{{ $item->id }}"
                                            >{{ $item->id }}</x-admin.checkbox>
                                        </th>
                                        <td>{{ $item->value_admin }}</td>
                                        <td>{{ $item->value }}</td>
                                        <td>
                                            @if( $item->image )
                                                <img style="max-width: 80px;" class="img-fluid"
                                                     src="{{ asset($item->image) }}" alt="{{ $item->value }}">
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if( $optionValues->hasPages() )
                            <div class="mt-4">
                                {{ $optionValues->links() }}
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Привязанные значения</h5>
                </div>
                <div class="card-body">
                    @if( !$optionValueToOptions->count() )
                        <p class="lead">Пусто...</p>
                    @else
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Значение для админа</th>
                                    <th scope="col">Значение</th>
                                    <th scope="col">Картинка</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $optionValueToOptions as $item )
                                    <tr>
                                        <th scope="row">
                                            <x-admin.checkbox
                                                id="{{ $item->id }}"
                                                wire:model="option_value_idx"
                                                value="{{ $item->id }}"
                                            >{{ $item->id }}</x-admin.checkbox>
                                        </th>
                                        <td>{{ $item->value_admin }}</td>
                                        <td>{{ $item->value }}</td>
                                        <td>
                                            @if( $item->image )
                                                <img style="max-width: 80px;" class="img-fluid"
                                                     src="{{ asset($item->image) }}" alt="{{ $item->value }}">
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
