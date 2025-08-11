@if ($paginator->hasPages())
<ul class="pagination clearfix">
    @if ($paginator->onFirstPage())
        <li class="disabled"><a><i class="far fa-angle-left"></i></a></li>
    @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="far fa-angle-left"></i></a></li>
    @endif
    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="disabled"><a>{{ $element }}</a></li>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li><a class="current">{{ $page }}</a></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="far fa-angle-right"></i></a></li>
    @else
        <li class="disabled"><a><i class="far fa-angle-right"></i></a></li>
    @endif
</ul>
@endif 