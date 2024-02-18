<!-- Trending Posts -->
<div class="section-full bg-white content-inner-1">
    <div class="container-fluid">
        @if (isset($args['title']) && !empty($args['title']))
        <div class="section-head text-center">
            <h4 class="title text-uppercase">{{ isset($args['title']) ? $args['title'] : '' }}</h4>
            <div class="title-separate"></div>
        </div>
        @endif
        <div class="trending-post-bx swiper swiper-container {{ $args['base'] }} owl-btn-center-lr">
            <div class="swiper-wrapper">
                @php
                    $blogs = HelpDesk::elementPostsByArgs($args);
                @endphp
                @forelse($blogs as $blog)
                    <div class="swiper-slide">
                        <div class="trending-post text-center">
                            <div class="trending-media">
                                <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                            </div>
                            <div class="trending-info">
                                <h3 class="trending-title"><a href="{{ DzHelper::laraBlogLink($blog->id) }}">{{ Str::limit($blog->title, 15, ' ...') }}</a></h3>
                                <div class="post-date">
                                    {{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
<!-- Trending Posts End -->


@push('inline-swiper')
    <script>
        'use strict';
        var swiper_class = '{{ $args['base'] }}';
        var space_between = {{ isset($args['space_between']) ? $args['space_between'] : 30 }};
        var loop = {{ isset($args['loop']) ? $args['loop'] : 'true' }};
        var keyboard_control = {{ isset($args['keyboard_control']) ? $args['keyboard_control'] : 'false' }};
        var auto_play = {{ isset($args['auto_play']) ? $args['auto_play'] : 'false' }};
        var autoplay_delay = {{ isset($args['autoplay_delay']) ? $args['autoplay_delay'] : 1500 }};
        var slides_per_view = {{ isset($args['slides_per_view']) ? $args['slides_per_view'] : 1 }};
        var centered_slides = {{ isset($args['centered_slides']) ? $args['centered_slides'] : 'true' }};
        var free_mode = {{ isset($args['free_mode']) ? $args['free_mode'] : 'false' }};
        var slider_speed = {{ isset($args['speed']) ? $args['speed'] : 1000 }};
        var effect = '{{ isset($args['effect']) ? $args['effect'] : '' }}';
        
        var autoplay_enable = ((typeof auto_play != "undefined") ? { delay: autoplay_delay } : false);
        var breakpoint1 = {{ isset($args['breakpoint1']) ? $args['breakpoint1'] : 1 }};
        var breakpoint2 = {{ isset($args['breakpoint2']) ? $args['breakpoint2'] : 2 }};
        var breakpoint3 = {{ isset($args['breakpoint3']) ? $args['breakpoint3'] : 3 }};
        var breakpoint4 = {{ isset($args['breakpoint4']) ? $args['breakpoint4'] : 5 }};
        var break_points = {};

        break_points[575] = {
            slidesPerView: breakpoint1,
        };
        break_points[768] = {
            slidesPerView: breakpoint2,
        };
        break_points[992] = {
            slidesPerView: breakpoint3,
        };
        break_points[1200] = {
            slidesPerView: breakpoint4,
        };

        var swiperMain = new Swiper('.'+swiper_class, {
            speed: slider_speed,
            effect: effect,
            centeredSlides: centered_slides,
            spaceBetween: space_between,
            slidesPerView: slides_per_view,
            loop:loop,
            keyboard: keyboard_control,
            autoplay: autoplay_enable,
            freeMode: free_mode,
            breakpoints:break_points,
            navigation: {
                nextEl: "."+swiper_class+"-next",
                prevEl: "."+swiper_class+"-prev",
            },
        });
    </script>
@endpush