<style>
    .pagination {
        justify-content: center;
    }

    .pager ul.pagination {
        text-align: center;
        margin: 0;
        padding: 0;
    }

    .pager .pagination li {
        display: inline;
        margin: 0 2px;
        padding: 0;
        display: inline-block;
        background: blue;
        width: 50px;
        height: 50px;
        text-align: center;
        position: relative;
    }

    .pager .pagination li a {
        vertical-align: middle;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        text-align: center;
        display: table;
        color: #fff;
        text-decoration: none;
    }

    .pager .pagination li a span {
        font-size: large;
        font-weight: bold;
        display: table-cell;
        vertical-align: middle;
    }

    .pager .pagination li a:hover,
    .pager .pagination li a.active {
        color: #000;
        background: #ccf;
    }
</style>
@if ($paginator->hasPages())

<div class="pager">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="pre"><a><span>«</span></a></li>
        @else
        <li class="pre"><a href="{{ $paginator->previousPageUrl() }}"><span>«</span></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li><a class="active"><span>{{ $page }}</span></a></li>
        @else
        <li><a href="{{ $url }}"><span>{{ $page }}</span></a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="next"><a href="{{ $paginator->nextPageUrl() }}"><span>»</span></a></li>
        @else
        <li class="next"><a href=""><span>»</span></a></li>
        @endif
    </ul>
</div>
@endif