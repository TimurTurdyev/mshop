@props([
    'prev',
    'next',
    'route',
])
<div class="flex justify-between">
    @if( $prev )
        <a href="{{ route($route, $prev) }}" class="flex items-center">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                 stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
            Предыдущая
        </a>
    @else
        <div></div>
    @endif
    @if( $next )
        <a href="{{ route($route, $next) }}" class="flex items-center">
            Следующая
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                 stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
    @endif
</div>
