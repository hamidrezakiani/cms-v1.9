@extends('layout.default')

@section('content')
<!-- Content -->

    @php
        $title =  __('Category : ').$title;
    @endphp
    @include('elements.banner-inner', compact('title'))

    <div class="content-inner">
        <div class="container">
            <div class="row">
                <div class="m-b40 {{ (DzHelper::dzHasSidebar()) ? 'col-lg-8 col-md-8 col-sm-12 col-12' : 'col-12' ; }}">
                    <div class="row blog-box">
                        @forelse($blogs as $blog)
                            <div class="{{ (DzHelper::dzHasSidebar()) ? 'col-md-6' : 'col-xl-4 col-md-6' ; }}">
                                <div class="dlab-card blog-grid h-100 ">
                                    <div class="dlab-media">
                                        <a href="{{ DzHelper::laraBlogLink($blog->id) }}">
                                            <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                        </a>
                                    </div>
                                    <div class="dlab-info">
                                        <div class="dlab-meta">
                                            <ul>
                                                <li class="post-category">
                                                    <a href="{{ DzHelper::laraBlogCategoryLink(optional(optional($blog->blog_categories)[0])->id) }}">{{ optional(optional($blog->blog_categories)[0])->title }}</a>, 
                                                    <a href="{{ DzHelper::laraBlogCategoryLink(optional(optional($blog->blog_categories)[1])->id) }}">{{ optional(optional($blog->blog_categories)[1])->title }}</a>
                                                </li>
                                                <li class="post-date">{{ __('at') }} <span>{{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}</span></li>
                                            </ul>
                                        </div>
                                        @php
                                            if($blog->visibility != 'Pu'){
                                                $blog_visibility = $blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ') ;
                                            }else {
                                                $blog_visibility = '';
                                            }
                                        @endphp
                                        <h4 class="dlab-title"><a href="{{ DzHelper::laraBlogLink($blog->id) }}">{{ $blog_visibility }}{{ Str::limit($blog->title, 35, ' ...') }}</a></h4>
                                        <p>{{ Str::limit($blog->excerpt, 60, ' ...') }}</p>
                                        <div class="dlab-feed">
                                            <ul>
                                                <li class="post-dislike"><a href="javascript:void(0);"><i class="ti-comment-alt"></i><span>{{ $blog->blog_comments->count() }}</span></a></li>
                                                <li class="post-share"><a href="{{ DzHelper::laraBlogLink($blog->id) }}"><span>{{ __('Read more') }}</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                        <div class="col-md-12">{{ __('No record found.') }}</div>
                        @endforelse
                        <div class="col-lg-12 m-b40">
                            {!! $blogs->links('elements.pagination') !!}
                        </div>
                    </div>
                </div>
                @include('widgets.sidebar')
            </div>
        </div>
    </div>

<!-- Content end -->
@endsection