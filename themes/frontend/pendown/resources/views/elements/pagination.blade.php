@if ($paginator->hasPages())
    <div class="pagination-bx d-flex align-items-center justify-content-between">
        <ul class="pagination-number">
            <li class="active">
                <a href="javascript:void(0);">{{ $paginator->currentPage() }}</a>
            </li>
            <li>
                <a href="javascript:void(0);">/ {{ $paginator->lastPage() }}</a>
            </li>
        </ul>
        <div class="pagination-number">

            @if ($paginator->onFirstPage())
                <span class="prev-page disabled"><i class="fa fa-long-arrow-left"></i> {{ __('Prev') }}</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}">
                    <span class="prev-page"><i class="fa fa-long-arrow-left"></i> {{ __('Prev') }}</span>
                </a>
            @endif


            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}">
                    <span class="next-page">{{ __('Next') }} <i class="fa fa-long-arrow-right"></i></span>
                </a>
            @else
                <span class="next-page disabled">{{ __('Next') }} <i class="fa fa-long-arrow-right"></i></span>
            @endif
        </div>
    </div>
@endif