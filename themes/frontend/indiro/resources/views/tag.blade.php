@extends('layout.default')

@section('content')
<!-- Content -->
    
    @php
        $title =  __('Tags : ').(isset($blog_tag->title) ? $blog_tag->title : '');
    @endphp
    @include('elements.banner-inner', compact('title'))

    <div class="content-inner">
        <div class="container">
            <div class="row">
                <div class="m-b40 {{ (DzHelper::dzHasSidebar()) ? 'col-xl-8 col-lg-8' : 'col-12' ; }}">
                    <div class="row loadmore-content">

                        @forelse($blogs as $blog)
                            <div class="m-b30 {{ (DzHelper::dzHasSidebar()) ? 'col-xl-6 col-md-6 ' : 'col-xl-4 col-md-6' ; }}">
                                <div class="dz-card style-1 shadow m-b30 h-100">
                                    <div class="dz-media">
                                        <a href="{{ DzHelper::laraBlogLink($blog->id) }}">
                                            <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
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
                                        <h4 class="dz-title"><a href="{{ DzHelper::laraBlogLink($blog->id) }}">{{ $blog_visibility }}{{ Str::limit($blog->title, 25, ' ...') }}</a></h4>
                                        <p>{{ Str::limit($blog->excerpt, 60, ' ...') }}</p>
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
<!-- Content End --> 

@endsection