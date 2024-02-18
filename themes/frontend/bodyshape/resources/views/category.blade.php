@extends('layout.default')

@section('content')
<!-- Content -->
   
    @php
        $title = __('Category : ').$title;
    @endphp
    @include('elements.banner-inner', compact('title'))

    <div class="section-full bg-white content-inner">
        <div class="container">
            <div class="row">
                <div class="{{ DzHelper::dzHasSidebar() ? 'col-lg-8 col-md-7 col-sm-12 col-12' : 'col-12' }}">
                    <div class="row loadmore-content">
                        @forelse($blogs as $blog)
                            <div class="{{ (DzHelper::dzHasSidebar()) ? 'col-lg-6' : 'col-lg-4' ; }} m-b30">
                                <div class="dz-card style-1 overlay-shine">
                                    <div class="dz-media ">
                                        <a href="{!! DzHelper::laraBlogLink($blog->id) !!}">
                                            <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                        </a>
                                    </div>
                                    <div class="dz-info">
                                        <div class="dz-meta">
                                            <ul>
                                                <li class="post-author">
                                                    <a href="{!! DzHelper::author($blog->user_id) !!}">
                                                        <span>{{ __('By') }} {{ optional($blog->user)->name }}</span>
                                                    </a>
                                                </li>
                                                <li class="post-date"><a href="javascript:void(0);">{{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}</a></li>
                                            </ul>
                                        </div>
                                        @php
                                            if($blog->visibility != 'Pu'){
                                                $blog_visibility = $blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ') ;
                                            }else {
                                                $blog_visibility = '';
                                            }
                                        @endphp
                                        <h4 class="title"><a href="{!! DzHelper::laraBlogLink($blog->id) !!}">{{ $blog_visibility }}{{ Str::limit($blog->title, 30, ' ...') }}</a></h4>
                                        <p>{{ Str::limit($blog->excerpt, 60, ' ...') }}</p>
                                        <a href="{!! DzHelper::laraBlogLink($blog->id) !!}" class="btn btn-primary btn-skew"><span>{{ __('Read More') }}</span></a>
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