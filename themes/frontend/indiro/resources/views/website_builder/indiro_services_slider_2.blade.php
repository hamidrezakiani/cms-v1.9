<section class="content-inner-1 section" style="background-image:url('{{ theme_asset('images/background/bg9.jpg') }}');background-size: cover;background-position: top;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-head style-1">
                    @if(isset($args['subtitle']))
                        <h5 class="sub-title text-primary">{{ $args['subtitle'] }}</h5>
                    @endif
                    <h3 class="title m-b30">{{ isset($args['title']) ? $args['title'] : '' }}</h3>
                    <div class="exp-row">
                        <h2 class="year">{{ isset($args['year']) ? $args['year'] : '' }}</h2>
                        <p>{{ isset($args['subpart_1']) ? $args['subpart_1'] : '' }}<span>{{ isset($args['subpart_2']) ? $args['subpart_2'] : '' }}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 m-b30">
                <p class="m-b30">{{ isset($args['description']) ? $args['description'] : '' }}</p>
                @if (isset($args['read_more']) && $args['read_more'] == true)
                <a href="{{ isset($args['read_more_page_id']) ? DzHelper::laraPageLink($args['read_more_page_id']) : 'javascript:void(0);' }}" class="btn btn-primary btn-border btn-border m-r10 m-b10">{{ __('Read More') }}</a>
                @endif
            </div>
        </div>
        @if(isset($args['services']) && !empty($args['services']))
        <div class="swiper swiper-container {{ $args['base'] }} slider-btn-1 ">
            <div class="swiper-wrapper">
                @php
                    $blogs = HelpDesk::getCptPostsBySlug($args['services']);
                @endphp
                @forelse($blogs as $blog)
                <div class="swiper-slide">
                    <div class="content-box2">
                        <div class="dz-info">
                            <h3 class="title">{{ $blog->title }}</h3>
                            <p>{{ $blog->content }} </p>
                        </div>
                        <div class="dz-media m-b30">
                            <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                        </div>
                        <div class="dz-bottom">
                            <a href="javascript: void(0);" class="btn-link">{{ __('READ MORE') }}<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
            @if(isset($args['pagination']) && $args['pagination'] == true)
            <div class="swiper-button">
                <div class="button-prev {{ $args['base'] }}-prev swiper-button-prev5" ><i class="las la-arrow-left"></i></div>
                <div class="button-next {{ $args['base'] }}-next swiper-button-next5"><i class="las la-arrow-right"></i></div>
            </div>
            @endif
        </div>              
        @endif
    </div>
</section>

@push('inline-swiper')
    <script>
        'use strict';
        var swiper_class = '{{ $args['base'] }}';
        var space_between = {{ isset($args['space_between']) ? $args['space_between'] : 30 }};
        var loop = {{ isset($args['loop']) ? $args['loop'] : 'false' }};
        var keyboard_control = {{ isset($args['keyboard_control']) ? $args['keyboard_control'] : 'false' }};
        var auto_play = {{ isset($args['auto_play']) ? $args['auto_play'] : 'false' }};
        var autoplay_delay = {{ isset($args['autoplay_delay']) ? $args['autoplay_delay'] : 1500 }};
        var slides_per_view = {{ isset($args['slides_per_view']) ? $args['slides_per_view'] : 1 }};
        var centered_slides = {{ isset($args['centered_slides']) ? $args['centered_slides'] : 'false' }};
        var free_mode = {{ isset($args['free_mode']) ? $args['free_mode'] : 'false' }};
        var slider_speed = {{ isset($args['speed']) ? $args['speed'] : 1000 }};
        var effect = '{{ isset($args['effect']) ? $args['effect'] : '' }}';
        var grabCursor = '{{ isset($args['grabCursor']) ? $args['grabCursor'] : 'false' }}';
        
        var autoplay_enable = ((typeof auto_play != "undefined") ? { delay: autoplay_delay } : false);
		var breakpoint1 = {{ isset($args['breakpoint1']) ? $args['breakpoint1'] : 1 }};
        var breakpoint2 = {{ isset($args['breakpoint2']) ? $args['breakpoint2'] : 2 }};
        var breakpoint3 = {{ isset($args['breakpoint3']) ? $args['breakpoint3'] : 2 }};
        var breakpoint4 = {{ isset($args['breakpoint4']) ? $args['breakpoint4'] : 3 }};
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
            grabCursor : grabCursor,
            navigation: {
                nextEl: "."+swiper_class+"-next",
                prevEl: "."+swiper_class+"-prev",
            },
            keyboard: keyboard_control,
            autoplay: autoplay_enable,
            freeMode: free_mode,
            breakpoints:break_points,
        });
    </script>
@endpush