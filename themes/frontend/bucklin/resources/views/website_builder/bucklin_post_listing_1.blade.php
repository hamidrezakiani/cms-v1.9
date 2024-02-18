@php
    $blogs = HelpDesk::elementPostsByArgs($args);
@endphp
<div class="section-full bg-white content-inner-3 pb-5">
    <div class="min-container">
		@if(isset($args['subtitle']) || isset($args['title']) || isset($args['description']))
		<div class="section-head text-center">
            <p>{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</p>
            <h4 class="title text-uppercase">{{ isset($args['title']) ? $args['title'] : '' }}</h4>
			<p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
        </div>
		@endif
        <div class="row ajaxLoadMoreContainer">
            @php
                $colClass = 'col-lg-6';
            @endphp
            @forelse($blogs as $key => $blog)
            @php
                if (isset($args['enable_collage']) && $args['enable_collage']) {
                    $colClass = $key % 5 == 0 ? 'col-lg-12' : 'col-lg-6';
                }
            @endphp
            <div class="{{ $colClass }} m-b30">
                <div class="blog-card blog-grid bg-dark">
                    <div class="blog-card-media">
                        <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                    </div>
                    <div class="blog-card-info text-center">
                        <h2 class="title"><a href="{{ DzHelper::laraBlogLink($blog->id) }}">{{ Str::limit($blog->title, 20, ' ...') }}</a></h2>
                        <div class="post-date">
                            {{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}
                        </div>
                        <ul class="add-info">
                            <li><a href="{{ DzHelper::laraBlogLink($blog->id) }}" class="btn outline radius-no white">{{ __('Read More') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
        <div class="text-center">
            @if (isset($args['pagination']) && $args['pagination'] == 'true')
                @if ($blogs->hasMorePages())
                <a 
                    href="javascript:void(0);"
                    class="btn el-ajax-load-more"
                    data-ajax-container="ajaxLoadMoreContainer"
                    data-no-of-posts="4"
                    data-current-page="2"
                    data-ajax-view="bucklin_post_listing_1_ajax"
                    {{ isset($args['order']) ? 'data-order='.$args['order'] : '' }}
                    {{ isset($args['orderby']) ? 'data-orderby='.$args['orderby'] : '' }}
                    {{ isset($args['post_with_images']) ? 'data-post_with_images='.$args['post_with_images'] : '' }}
                    {{ isset($args['post_category_ids']) ? 'data-post_category_ids='.$args['post_category_ids'] : '' }}
                >{{ __('Load More') }}</a>
                @else
                <a href="javascript:void(0);" class="btn outline disabled">{{ __('No More Posts') }}</a>
                @endif
        
            @elseif (isset($args['view_all']) && $args['view_all'] == 'true')
            <a href="{{ isset($args['page_id']) ? DzHelper::laraPageLink($args['page_id']) : 'javascript:void(0);' }}" class="btn outline outline-1 radius-xl "> {{ __('View All') }}</a>
            @endif
        </div>
    </div>
</div>