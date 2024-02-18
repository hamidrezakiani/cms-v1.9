<div class="widget widget_categories">
    <h6 class="widget-title text-center">
        <span>{{ __('Categories') }}</span>
    </h6>
    <ul>
        @forelse($blogcategories as $blogcategory)
            <li><a href="{!! DzHelper::laraBlogCategoryLink($blogcategory->id) !!}">{{ $blogcategory->title }} </a> <span class="badge">{{ $blogcategory->blog_count; }}</span></li>
        @empty
            <li class="col-md-12">{{ __('No record found.') }}</li>
        @endforelse
    </ul>
</div>