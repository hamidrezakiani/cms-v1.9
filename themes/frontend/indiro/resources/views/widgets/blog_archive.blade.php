<div class="widget style-1 widget_categories">
    <div class="widget-title">
        <h4 class="title">{{ __('Archives') }}</h4>
    </div>
    <ul>
        @forelse($archives as $archive)
            <li class="cat-item"><a href="{!! DzHelper::laraBlogArchiveLink($archive->year,$archive->month) !!}"> {{ $archive->month_name  }} {{ $archive->year }}</a>  {{ $archive->data  }}  </li>
        @empty
            <li class="col-md-12">{{ __('No record found.') }}</li>
        @endforelse
    </ul>

</div>