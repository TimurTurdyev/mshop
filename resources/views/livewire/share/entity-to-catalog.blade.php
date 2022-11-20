<div>
    <x-admin.label>Категории</x-admin.label>
    <div class="well well-sm" style="height: 350px; overflow: auto;">
        <table class="table table-striped">
            <tbody>
            @foreach( $catalogs as $catalog )
                <tr>
                    <td>
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model="selected_catalogs" value="{{ $catalog['id'] }}">
                            <span class="form-check-label">
                                {{ $catalog['name'] }}
                            </span>
                        </label>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
