<div>
    <div class="row">
        <div class="col-6">
            <livewire:option.option-value-list
                key="option-value-list{{ now() }}"
                :option_value_idx="$option_value_idx">
            </livewire:option.option-value-list>
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
                                    <th scope="col">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $optionValueToOptions as $item )
                                    <tr>
                                        <th scope="row">
                                            <x-admin.checkbox
                                                id="check_b{{ $item->id }}"
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
                                        <td class="table-action">
                                            <a wire:click.prevent="$emit('editOptionValue', {{ $item->id }})"
                                               data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-edit-2 align-middle">
                                                    <path
                                                        d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                </svg>
                                            </a>
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
