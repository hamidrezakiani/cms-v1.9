<div class="widget widget_tag_cloud">
    <h6 class="widget-title text-center">
        <span>{{ __('Tags') }}</span>
    </h6>    
    <div class="tagcloud">
        @forelse($tags as $tag)
        <a href="{!! DzHelper::laraBlogTagLink($tag->id); !!}"><span>{{ $tag->title }}</span></a>
        @empty
        <div class="col-md-12">{{ __('No record found.') }}</div>
        @endforelse
    </div>
</div>