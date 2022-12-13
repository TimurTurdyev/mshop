@props([
    'navs',
])

<div
    class="overflow-hidden overflow-x-auto text-center">
    <ul class="flex space-x-12">
        @foreach( $navs as $nav )
            @if( $nav['active'] )
                <li>
                    <a href="{{ $nav['link'] }}"
                       class="inline-block py-4 rounded-t-lg border-b-2 border-red-600 active"
                       aria-current="page">{{ $nav['title'] }}</a>
                </li>
            @else
                <li>
                    <a href="{{ $nav['link'] }}"
                       class="inline-block py-4 rounded-t-lg border-b-2 border-transparent hover:border-red-600">
                        {{ $nav['title'] }}
                    </a>
                </li>
            @endif

        @endforeach

    </ul>
</div>
