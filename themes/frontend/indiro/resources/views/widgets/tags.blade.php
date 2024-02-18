<div class="widget style-1 widget_tag_cloud">
    <div class="widget-title">
        <h4 class="title">{{ __('Popular Tags') }}</h4>
    </div>
    <div class="tagcloud">
        @forelse($tags as $tag)
        <a href="{!! DzHelper::laraBlogTagLink($tag->id); !!}">{{ $tag->title }}</a>
        @empty
        <div class="col-md-12">{{ __('No record found.') }}</div>
        <a href="javascript:void(0);">{{ __('No Tags found.') }}</a>
        @endforelse
    </div>
</div>