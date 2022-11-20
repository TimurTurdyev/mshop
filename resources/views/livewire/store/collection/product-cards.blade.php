<div>
    @if( $products->total() )
        <h2 class="text-2xl mb-10">{{ $groupName }}({{ $products->total() }})</h2>
        <x-store.catalog :entityItems="$products" show="product"></x-store.catalog>
        {{ $products->links() }}
        <hr class="my-6 py-3">
    @endif
</div>
