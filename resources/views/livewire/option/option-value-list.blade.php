<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-md-flex justify-content-md-between">
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                        <div>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="feather feather-plus align-middle">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <x-admin.input wire:model="search" placeholder="Поиск"></x-admin.input>

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
                                    <th scope="col">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $optionValues as $item )
                                    <tr>
                                        <th scope="row">
                                            <x-admin.checkbox
                                                id="check_a{{ $item->id }}"
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
                                            <a wire:click.prevent="$emit('delete', {{ $item->id }})">
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
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Редактирование</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <livewire:option.option-value-modal></livewire:option.option-value-modal>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('optionValueModalClose', event => {
            let myModalEl = document.getElementById('exampleModal')
            let modal = bootstrap.Modal.getInstance(myModalEl) // Returns a Bootstrap modal instance
            modal.hide();
        });
    </script>
</div>
