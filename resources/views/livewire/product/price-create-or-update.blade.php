<div>
    <form wire:submit.prevent="save">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            @foreach( $price->properties as $property )
                                <livewire:product.property-edit
                                    wire:key="property-{{ $property->id }}"
                                    :options="$options"
                                    :property="$property"
                                ></livewire:product.property-edit>
                            @endforeach
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-3 text-sm-end">Опции</label>
                            <div class="col-sm-9 ms-sm-auto">
                                <button type="button" class="btn btn-success" wire:click.prevent="addProperty">
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
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-3 text-sm-end">Артикул</label>
                            <div class="col-sm-9">
                                <x-admin.input errorName="price.sku" wire:model="price.sku"></x-admin.input>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-3 text-sm-end">Цена</label>
                            <div class="col-sm-9">
                                <x-admin.input errorName="price.price" wire:model="price.price"></x-admin.input>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-3 text-sm-end">Акционная цена</label>
                            <div class="col-sm-9">
                                <x-admin.input errorName="price.special" wire:model="price.special"></x-admin.input>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-3 text-sm-end">Кол-во</label>
                            <div class="col-sm-9">
                                <x-admin.input errorName="price.quantity" wire:model="price.quantity"></x-admin.input>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-3 text-sm-end">Сортировка</label>
                            <div class="col-sm-9">
                                <x-admin.input errorName="price.sort_order" wire:model="price.sort_order"></x-admin.input>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-3 text-sm-end pt-sm-0">Статус</label>
                            <div class="col-sm-9">
                                <x-admin.switcher errorName="price.status" wire:model="price.status"></x-admin.switcher>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-9 ms-sm-auto">
                                <button type="button" class="btn btn-danger"
                                        wire:click.prevent="delete({{ $price->id }})">Удалить
                                </button>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            @foreach( $images as $key => $image )
                                <div class="col-md-4 mb-3">
                                    <x-admin.image
                                        id="priceImages{{ $price->id }}_{{ $key }}"
                                        :value="$image"
                                        errorName="images.{{ $key }}"
                                        wire:model="images.{{ $key }}"
                                    ></x-admin.image>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-success" wire:click.prevent="addImage">Добавить фото
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
