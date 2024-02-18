@if ($paginator->hasPages())
    <nav aria-label="Blog Pagination">
        <ul class="pagination text-center m-t10">

            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link border-0 shadow-none prev"><i class="fa fa-chevron-left"></i></span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link border-0 shadow-none prev" href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-chevron-left"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link border">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link border" href="javascript:void(0);"><span>{{ $page }}</span></a></li>
                        @else
                            <li class="page-item"><a class="page-link border" href="{{ $url }}"><span>{{ $page }}</span></a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link border-0 shadow-none next" href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-chevron-right"></i></a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link border-0 shadow-none next"><i class="fa fa-chevron-right"></i></span>
                </li>
            @endif

            
        </ul>
    </nav>
@endif