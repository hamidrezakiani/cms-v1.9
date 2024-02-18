@php
    $blogs = HelpDesk::elementPostsByArgs($args);
    $box = 1;
@endphp

<!-- From Our Blog Start -->
<section class="content-inner bg-white blog-wrapper">
    <img class="bg-shape1" src="{{ theme_asset('images/home-banner/shape1.png') }}" alt="">

    <div class="container">
        @if (isset($args['subtitle']) || isset($args['title']) || isset($args['view_all']))
        <div class="section-head d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="0.2s">
            <div class="w-75">
                <h6 class="sub-title text-primary">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</h6>
                <h2 class="title">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
                <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
            </div>
            @if (isset($args['view_all']) && $args['view_all'] == 'true')
                <a class="btn btn-primary btn-gradient btn-shadow" href="{{ isset($args['page_id']) ? DzHelper::laraPageLink($args['page_id']) : 'javascript:void(0);' }}">{{ __('View All') }}</a>
            @endif
        </div>
        @endif
        <div class="row d-block clearfix ajaxLoadMoreContainer">
            @forelse ($blogs as $blog)
                @php
                    $box = ($box > 3) ? 1 : $box;
                @endphp
                @if ($box == 2)
                    <div class="col-xl-5 col-lg-12 float-end m-b30">
                        <div class="dz-card style-2" style="background-image: url({{ DzHelper::getStorageImage('storage/blog-images/'.$blog->feature_img->value) }});background-position: center;">
                            <div class="dz-category">
                                <ul class="dz-badge-list">
                                    <li>
                                        <a href="javascript:void(0);" class="dz-badge">{{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dz-info">
                                <h2 class="dz-title"><a href="{{ DzHelper::laraBlogLink($blog->id) }}" class="text-white">{{ Str::limit($blog->title, 30, ' ...') }}</a></h2>
                                <div class="dz-meta">
                                    <ul>
                                        <li class="post-author">
                                            <a href="{{ DzHelper::author($blog->user_id) }}">
                                                <span>{{ __('By') }} {{ optional($blog->user)->name }}</span>
                                            </a>
                                        </li>
                                        <li class="post-date"><a href="javascript:void(0);"> {{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-xl-7 col-lg-12 {{ $box == 1 ? 'float-start' : '' }}">
                        <div class="dz-card style-1 blog-half m-b30">
                            <div class="dz-media">
                                <a href="{{ DzHelper::laraBlogLink($blog->id) }}">
                                    <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                </a>
                                <ul class="dz-badge-list">
                                    <li><a href="javascript:void(0);" class="dz-badge">{{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}</a></li>
                                </ul>
                                <a href="{{ DzHelper::laraBlogLink($blog->id) }}" class="btn btn-secondary">{{ __('Read More') }}</a>
                            </div>
                            <div class="dz-info">
                                <div class="dz-meta">
                                    <ul>
                                        <li class="post-author">
                                            <a href="{{ DzHelper::author($blog->user_id) }}">
                                                <span>{{ __('By') }} {{ optional($blog->user)->name }}</span>
                                            </a>
                                        </li>
                                        <li class="post-date"><a href="javascript:void(0);"> {{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}</a></li>
                                    </ul>
                                </div>
                                <h4 class="dz-title"><a href="{{ DzHelper::laraBlogLink($blog->id) }}">{{ Str::limit($blog->title, 35, ' ...') }}</a></h4>
                                <p class="m-b0">{{ Str::limit($blog->excerpt, 60, ' ...') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                @php
                    $box++;
                @endphp
            @empty
            @endforelse
        </div>
        <div class="text-center">
            @if (isset($args['pagination']) && $args['pagination'] == 'true')
                @if ($blogs->hasMorePages())
                <a 
                    href="javascript:void(0);"
                    class="btn btn-primary el-ajax-load-more"
                    data-ajax-container="ajaxLoadMoreContainer"
                    data-no-of-posts="3"
                    data-current-page="2"
                    data-ajax-view="cryptozone_post_listing_1_ajax"
                    {{ isset($args['order']) ? 'data-order='.$args['order'] : '' }}
                    {{ isset($args['orderby']) ? 'data-orderby='.$args['orderby'] : '' }}
                    {{ isset($args['post_with_images']) ? 'data-post_with_images='.$args['post_with_images'] : '' }}
                    {{ isset($args['post_category_ids']) ? 'data-post_category_ids='.$args['post_category_ids'] : '' }}
                >{{ __('Load More') }}</a>
                @else
                <a href="javascript:void(0);" class="btn btn-primary disabled">{{ __('No More Posts') }}</a>
                @endif
            @endif
        </div>
    </div>
</section>