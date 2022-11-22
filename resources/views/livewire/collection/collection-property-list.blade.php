<div>
    <div class="d-md-flex justify-content-md-between mb-3">
        <h1 class="h3 mb-3">{{ $title }}</h1>
        <div class="d-md-flex mb-3">
            <button type="button" class="btn btn-primary" wire:click="add">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-plus align-middle">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if( !$prices->count() )
                <div class="card">
                    <div class="card-body">
                        <p class="lead">Пусто...</p>
                    </div>
                </div>
            @else
                @foreach( $prices as $item )
                    <livewire:collection.collection-property-create-or-update wire:key="{{ $loop->index }}" :options="$options" :collectionProperty="$item"></livewire:collection.collection-property-create-or-update>
                @endforeach
            @endif
        </div>
    </div>
</div>
