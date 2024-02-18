@extends('layout.default')

@section('content')
<!-- Content -->

    @php
        $title = __('Tags : ').$blog_tag->title;
    @endphp
    @include('elements.banner-inner', compact('title'))

<div class="section-full bg-white content-inner">
    <div class="container">
        <div class="row">
            <div class="{{ DzHelper::dzHasSidebar() ? 'col-lg-8 col-md-7 col-sm-12 col-12' : 'col-12' }}">
                <div class="row loadmore-content">
                    @forelse($blogs as $blog)
                        <div class="col-lg-6 m-b30">
                            <div class="blog-card blog-grid bg-dark">
                                <div class="blog-card-media">
                                    <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                </div>
                                <div class="blog-card-info text-center">
                                    @php
                                        if($blog->visibility != 'Pu'){
                                            $blog_visibility = $blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ') ;
                                        }else {
                                            $blog_visibility = '';
                                        }
                                    @endphp
                                    <h4 class="title"><a href="{!! DzHelper::laraBlogLink($blog->id) !!}">{{ $blog_visibility }}{{ Str::limit($blog->title, 30, ' ...') }}</a></h4>
                                    <div class="post-date">
                                        {{ $blog->publish_on }}
                                    </div>
                                    <p>
                                        {{ Str::limit($blog->excerpt, 70, ' ...') }}
                                    </p>
                                    <ul class="add-info">
                                        <li><a href="{!! DzHelper::laraBlogLink($blog->id) !!}" class="btn outline radius-no white">{{ __('Read More') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="col-md-12">{{ __('No record found.') }}</div>
                    @endforelse
                    @if (!empty($blogs))
                        <div class="col-lg-12 m-b40">
                            {!! $blogs->links('elements.pagination') !!}
                        </div>
                    @endif
                </div>
            </div>
            @include('widgets.sidebar')
        </div>
    </div>
</div>

<!-- Content end -->
@endsection