@php
    $blogs = HelpDesk::elementPostsByArgs($args);
@endphp

<!-- Blog Slider -->
<div class="section-full blog-full-bx" style="background-image: url({{ isset($args['background_image']) ? asset('storage/page-images/magic-editor/'.$args['background_image']) : '' }}); background-size: cover;">
    <div class="container">
        <div class="blog-slider-full bg-dark swiper swiper-container {{ $args['base'] }} owl-btn-center-lr">
            <div class="swiper-wrapper">
                @forelse($blogs as $blog)
                <div class="swiper-slide">
                    <div class="blog-slider-box">
                        <div class="post-date">
                            {{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}
                        </div>
                        <div>
                            <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" class="w-100" alt="{{ __('Blog Image') }}">
                        </div>
                        <h2 class="title"><a href="{{ DzHelper::laraBlogLink($blog->id) }}">{{ Str::limit($blog->title, 30, ' ...') }}</a></h2>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
            <div class="num-pagination owl-nav">
                <div class="{{ $args['base'] }}-prev owl-prev"><i class="fa fa-angle-left"></i></div>
                <div class="{{ $args['base'] }}-next owl-next"><i class="fa fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Slider End -->

@push('inline-swiper')
    <script>
        'use strict';
        var swiper_class = '{{ $args['base'] }}';
        var space_between = {{ isset($args['space_between']) ? $args['space_between'] : 0 }};
        var loop = {{ isset($args['loop']) ? $args['loop'] : 'false' }};
        var keyboard_control = {{ isset($args['keyboard_control']) ? $args['keyboard_control'] : 'false' }};
        var auto_play = {{ isset($args['auto_play']) ? $args['auto_play'] : 'false' }};
        var autoplay_delay = {{ isset($args['autoplay_delay']) ? $args['autoplay_delay'] : 1500 }};
        var slides_per_view = '{{ isset($args['slides_per_view']) ? $args['slides_per_view'] : 1 }}';
        var centered_slides = {{ isset($args['centered_slides']) ? $args['centered_slides'] : 'false' }};
        var free_mode = {{ isset($args['free_mode']) ? $args['free_mode'] : 'false' }};
        var slider_speed = {{ isset($args['speed']) ? $args['speed'] : 1000 }};
        
        var autoplay_enable = ((typeof auto_play != "undefined") ? { delay: autoplay_delay } : false);

        var swiperMain = new Swiper('.'+swiper_class, {
            speed: slider_speed,
            centeredSlides: centered_slides,
            spaceBetween: space_between,
            slidesPerView: slides_per_view,
            loop:loop,
            keyboard: keyboard_control,
            autoplay: autoplay_enable,
            freeMode: free_mode,
            navigation: {
                nextEl: "."+swiper_class+"-next",
                prevEl: "."+swiper_class+"-prev",
            },
        });
    </script>
@endpush