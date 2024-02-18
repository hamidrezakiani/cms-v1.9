
@if (!empty(config('Widget.show_sidebar')))
<div class="col-xl-4 col-lg-4">
    <aside class="side-bar sticky-top right">

        {{-- Widget-Search --}}
        {!! DzHelper::SearchWidget(); !!}
        {{-- Widget-Search --}}

        {{-- recent-blogs --}}
        @if(!empty(config('Widget.show_recent_post_widget')))
            {!! DzHelper::recentBlogs( array('limit'=>3, 'order'=>'asc', 'orderby'=>'created_at') ); !!}
        @endif
        {{-- recent-blogs --}}

        {{-- recent-categories --}}
        {!! DzHelper::categoryBlogs( array('limit'=>4, 'order'=>'asc', 'orderby'=>'title')); !!}
        {{-- recent-categories --}}
        
        {{-- recent-archives --}}
        {!! DzHelper::archiveBlogs(); !!}
        {{-- recent-archives --}}

        {{-- BlogTags --}}
        {!! DzHelper::BlogTags(); !!}
        {{-- BlogTags --}}
    </aside>
</div>
@endif