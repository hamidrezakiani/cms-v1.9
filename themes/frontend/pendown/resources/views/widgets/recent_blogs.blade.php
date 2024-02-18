<div class="widget recent-posts-entry">
    <h6 class="widget-title text-center">
        <span>{{ __('Featured Posts') }}</span>
    </h6>
    <div class="widget-post-bx">

        @forelse($blogs as $blog)
        <div class="widget-post clearfix">
            <div class="dlab-media">
                <img src="{{ asset('storage/blog-images/'.$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
            </div>

            <div class="dlab-info">
                <div class="dlab-meta">
                    <ul>
                        <li class="post-category">
                            <a href="{{ DzHelper::laraBlogCategoryLink(optional(optional($blog->blog_categories)[0])->id) }}">{{ optional(optional($blog->blog_categories)[0])->title }}</a>
                        </li>
                        <li class="post-date">{{ __('at') }} <span>{{ $blog->publish_on }}</span></li>
                    </ul>
                </div>
                <h6 class="dlab-title">
                    <a href="{{ DzHelper::laraBlogLink($blog->id) }}">{{ Str::limit($blog->title, 30, ' ...') }}</a>
                </h6>
            </div>
        </div>
        @empty
        <div class="col-md-12">{{ __('No record found.') }}</div>
        @endforelse

    </div>
</div>
