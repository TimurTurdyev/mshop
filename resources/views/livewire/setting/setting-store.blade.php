<div>
    <x-slot:title>Настройки сайта</x-slot:title>
    <div class="d-md-flex justify-content-md-between">
        <h1 class="h3 mb-3">Настройки сайта</h1>
        <div>
            <button type="button" class="btn btn-primary" wire:click.prevent="save">
                Сохранить
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-xl-2">

            <div class="card">
                <div class="list-group list-group-flush" role="tablist">
                    @foreach( $tabs as $tab => $title )
                        @if( $tab === $tabActive )
                            <a class="list-group-item list-group-item-action active" data-bs-toggle="list"
                               href="#{{ $tab }}"
                               role="tab" aria-selected="true">
                                {{ $title }}
                            </a>
                        @else
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#{{ $tab }}"
                               role="tab"
                               aria-selected="false" tabindex="-1">
                                {{ $title }}
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-9 col-xl-10">
            <div class="tab-content">
                @foreach( $tabs as $tab => $title )
                    <div class="tab-pane fade @if( $tab === $tabActive )active show @endif" id="{{ $tab }}"
                         role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">{{ $title }}</h5>
                            </div>
                            <div class="card-body">
                                @include( 'livewire.setting.partials.' . $tab )
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            const triggerTabList = document.querySelectorAll('a[data-bs-toggle="list"]');
            triggerTabList.forEach(triggerEl => {
                triggerEl.addEventListener('shown.bs.tab', event => {
                    const active = event.target.hash.replace('#', '');
                    Livewire.emit('changeTabActive', active);
                });
            });
        });
    </script>
@endpush
