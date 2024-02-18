<div class="widget widget_categories">
    <h6 class="widget-title text-center">
        <span>{{ __('Archives') }}</span>
    </h6>
    <ul>
        @forelse($archives as $archive)
            <li><a href="{!! DzHelper::laraBlogArchiveLink($archive->year,$archive->month) !!}"> {{ $archive->month_name  }} {{ $archive->year }}</a>  <span class="badge">{{ $archive->data }}</span> </li>
        @empty
            <li class="col-md-12">{{ __('No record found.') }}</li>
        @endforelse
    </ul>

</div>