@extends('layout.default')

@section('content')

<!-- Content -->

    @php
        $search_res = $title;
        $title =  __('Search Results for : '). $title;
    @endphp
    @include('elements.banner-inner', compact('title'))

    <div class="content-inner">
        <div class="container">
            <div class="row">
                <div class="m-b40 {{ (DzHelper::dzHasSidebar()) ? 'col-xl-8 col-lg-8' : 'col-12' ; }}">
                    <div class="widget w-100">
                        <div class="search-bx">
                            <form action="{{ route('permalink.search') }}" role="search" method="get">
                                <div class="input-group">
                                    <input name="s" type="text" class="form-control" value="{{ $search_res }}" placeholder="{{ __('Search Here...') }}">

                                    <span class="input-group-append">
                                        <button type="submit" class="btn"><i class="ti-search"></i></button>
                                    </span> 
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row loadmore-content">
                        @forelse($blogs as $blog)
                            <div class="{{ (DzHelper::dzHasSidebar()) ? 'col-md-6' : 'col-xl-4 col-md-6' }}">
                                @php
                                    $single_link = DzHelper::laraBlogLink($blog->id);
                                    if(array_key_exists('page_type',$blog->toArray())) {
                                        $single_link = DzHelper::laraPageLink($blog->id);
                                    }
                                @endphp
                                <div class="dlab-card blog-grid h-100 ">
                                    <div class="dlab-media">
                                        <a href="{{ $single_link }}">
                                            @if(optional($blog->feature_img)->value)
                                                @if (Storage::exists('public/page-images/'.$blog->feature_img->value))
                                                    <img src="{{ asset('storage/page-images/'.$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                                @elseif (Storage::exists('public/blog-images/'.$blog->feature_img->value))
                                                    <img src="{{ asset('storage/blog-images/'.$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                                @else
                                                    <img src="{{ asset('images/noimage.jpg') }}" alt="{{ __('Blog Image') }}">
                                                @endif
                                            @else
                                                <img src="{{ asset('images/noimage.jpg') }}" alt="{{ __('Blog Image') }}">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="dlab-info">
                                        <div class="dlab-meta">
                                            <ul>
                                                <li class="post-category d-block">
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
                                        <h4 class="dlab-title"><a href="{{ $single_link }}">{{ $blog_visibility }}{{ Str::limit($blog->title, 35, ' ...') }}</a></h4>
                                        <p>{{ Str::limit($blog->excerpt, 60, ' ...') }}</p>
                                        <div class="dlab-feed">
                                            <ul>
                                                <li class="post-dislike">
                                                    <a href="javascript:void(0);">
                                                        <i class="ti-comment-alt"></i>
                                                        @if(array_key_exists('page_type',$blog->toArray()))
                                                            <span>{{ $blog->page_comments->count() }}</span>
                                                        @else
                                                            <span>{{ $blog->blog_comments->count() }}</span>
                                                        @endif
                                                    </a>
                                                </li>
                                                <li class="post-share"><a href="{{ $single_link }}"><span>{{ __('Read more') }}</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        <div class="col-md-12">{{ __('No record found.') }}</div>
                        @endforelse
                    </div>
                </div>
                @include('widgets.sidebar')
            </div>
        </div>
    </div>
<!-- Content end -->
@endsection