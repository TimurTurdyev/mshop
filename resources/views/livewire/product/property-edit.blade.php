<div class="mb-3 row">
    <div class="col-sm-3 text-sm-end">
        <x-admin.select errorName="property.option_id"
                        key="group_admin"
                        :items="$options"
                        wire:model="property.option_id"
        ></x-admin.select>
    </div>
    <div class="col-sm-7">
        <x-admin.select errorName="property.option_value_id"
                        key="value"
                        :items="$optionValues"
                        wire:model="property.option_value_id"
        ></x-admin.select>
    </div>
    <div class="col-sm-2">
        <button type="button" class="btn btn-danger" wire:click.prevent="delete({{ $property->id }})">
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
