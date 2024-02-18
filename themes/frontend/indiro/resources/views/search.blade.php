@extends('layout.default')

@section('content')

<!-- Content -->

    @php
        $search_res = $title;
        $title =  __('Search Results for : '). $title;
    @endphp
    @include('elements.banner-inner', compact('title'))

    <div class="section-full bg-white content-inner">
        <div class="container">
            <div class="row">

                <div class="m-b40 {{ (DzHelper::dzHasSidebar()) ? 'col-xl-8 col-lg-8' : 'col-12' ; }}">
                    <div class="widget w-100">
                        <div class="search-bx">
                            <form action="{{ route('permalink.search') }}" role="search" method="get">
                                <div class="input-group">
                                    <input name="s" type="text" class="form-control" value="{{ $search_res }}" placeholder="{{ __('Search Here...') }}">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary sharp radius-no"><i class="la la-search scale3"></i></button>
                                    </span> 
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row loadmore-content">
                        @forelse($blogs as $blog)
                            <div class="m-b30 {{ (DzHelper::dzHasSidebar()) ? 'col-xl-6 col-md-6 ' : 'col-xl-4 col-md-6' ; }}">
                                @php
                                    $single_link = DzHelper::laraBlogLink($blog->id);
                                    if(array_key_exists('page_type',$blog->toArray())) {
                                        $single_link = DzHelper::laraPageLink($blog->id);
                                    }
                                @endphp
                                <div class="dz-card style-1 shadow m-b30 h-100">
                                    <div class="dz-media">
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
                                    <div class="dz-info">
                                        <div class="dz-meta">
                                            <ul>
                                                <li class="post-date">{{ $blog->publish_on }}</li>
                                            </ul>
                                        </div>
                                        @php
                                            if($blog->visibility != 'Pu'){
                                                $blog_visibility = $blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ') ;
                                            }else {
                                                $blog_visibility = '';
                                            }
                                        @endphp
                                        <h4 class="dz-title"><a href="{{ $single_link }}">{{ $blog_visibility }}{{ Str::limit($blog->title, 25, ' ...') }}</a></h4>
                                        <p>{{ Str::limit($blog->excerpt, 60, ' ...') }}</p>
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