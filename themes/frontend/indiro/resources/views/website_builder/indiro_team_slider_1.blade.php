<section class="content-inner-2">
    <div class="container"> 
        <div class="section-head style-1 text-center">
            @if(isset($args['subtitle']))
                <h5 class="sub-title text-primary">{{ $args['subtitle'] }}</h5>
            @endif
            <h3 class="title m-b30">{{ isset($args['title']) ? $args['title'] : '' }}</h3>
            <p class="m-b30">{{ isset($args['description']) ? $args['description'] : '' }}</p>
        </div>
        @if(isset($args['teams']) && !empty($args['teams']))
        <div class="team-swiper-1 btn-center-lr">
            <div class="swiper swiper-container {{ $args['base'] }} ">
                <div class="swiper-wrapper">
                    @php
                        $blogs = HelpDesk::getCptPostsBySlug($args['teams']);
                    @endphp
                    @forelse($blogs as $blog)
                    <div class="swiper-slide">
                        <div class="dz-team style-1 text-center m-b10">
                            <div class="dz-media">
                                <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="">

                                @php
                                    $blogMeta_you = HelpDesk::getPostMeta($blog->id, 'youtube');
                                    $blogMeta_fb = HelpDesk::getPostMeta($blog->id, 'facebook');
                                    $blogMeta_insta = HelpDesk::getPostMeta($blog->id, 'instagram');
                                    $blogMeta_twitter = HelpDesk::getPostMeta($blog->id, 'twitter');
                                @endphp
                                <ul class="team-social">
                                    <li>
                                        <a href="{{ $blogMeta_fb }}" target="_blank" class="facebook">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $blogMeta_twitter }}" target="_blank" class="twitter">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $blogMeta_insta }}" target="_blank" class="instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $blogMeta_you }}" target="_blank" class="youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dz-content">
                                <h3 class="dz-name">{{ $blog->title }}</h3>
                                <h6 class="dz-position text-primary">{{ $blog->content }}</h6>
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
            @if(isset($args['navigation']) && $args['navigation'] == true)
            <div class="swiper-button">
                <div class="btn-prev {{ $args['base'] }}-prev"><i class="las la-angle-left"></i></div>
                <div class="btn-next {{ $args['base'] }}-next"><i class="las la-angle-right"></i></div>
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