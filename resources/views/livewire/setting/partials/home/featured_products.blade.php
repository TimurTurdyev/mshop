<div class="row">
    @foreach( $setting['featured_products'] as $item )
        <div class="col-md-8">
            <div class="mb-3">
                <x-admin.input
                    id="featured_product_group{{ $loop->index }}"
                    label="Заголовок"
                    wire:model="setting.featured_products.{{ $loop->index }}.group"
                ></x-admin.input>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 2%">#</th>
                    <th style="width:70%;">ID</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $item['products'] as $product )
                    <tr>
                        <td>{{ $loop->index }}</td>
                        <td>
                            <x-admin.input
                                wire:model="setting.featured_products.{{ $loop->parent->index }}.products.{{ $loop->index }}"
                            ></x-admin.input>
                        </td>
                        <td class="table-action">
                            <a href="#" wire:click.prevent="removeProductItem({{ $loop->parent->index }}, {{ $loop->index }})">
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
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary me-3" wire:click.prevent="addProductItem({{ $loop->index }})">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round"
                         class="feather feather-plus align-middle">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </button>
                <button type="button" class="btn btn-danger" wire:click.prevent="removeProductBlock({{ $loop->index }})">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-trash-2 align-middle">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                </button>
            </div>
        </div>
        <div class="col-12">
            <hr class="mt-5">
        </div>
    @endforeach
</div>
<button type="button" class="btn btn-primary" wire:click.prevent="addProductBlock()">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
         fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round"
         stroke-linejoin="round"
         class="feather feather-plus align-middle">
        <line x1="12" y1="5" x2="12" y2="19"></line>
        <line x1="5" y1="12" x2="19" y2="12"></line>
    </svg>
</button>
