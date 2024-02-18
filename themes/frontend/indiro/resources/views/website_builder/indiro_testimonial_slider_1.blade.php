<section class="content-inner-1 bg-white aos-item" data-aos="fade-in" data-aos-duration="800" data-aos-delay="200">
    <div class="container">
        <div class="section-head style-1 text-center">
            <h5 class="text-primary sub-title">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</h5>
            <h2 class="title">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
            <p class="text-white">{{ isset($args['description']) ? $args['description'] : '' }}</p>
        </div>
        @if(isset($args['testimonials']) && !empty($args['testimonials']))
        <div class="swiper swiper-container slider-btn-1 {{ $args['base'] }}">
            <div class="swiper-wrapper">
                @php
                    $blogs = HelpDesk::getCptPostsBySlug($args['testimonials']);
                @endphp 
                @forelse($blogs as $blog)
                <div class="swiper-slide">
                    <div class="testimonial-4">
                        <div class="testimonial-pic">
                            <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="">
                        </div>
                        <div class="testimonial-info">
                            <div class="testimonial-text">
                                <p>{{ $blog->content }}</p>
                            </div>
                            <h5 class="testimonial-name">{{ $blog->title }}</h5> 
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
            @if(isset($args['pagination']) && $args['pagination'] == true)
            <div class="swiper-button">
                <div class="button-prev  {{ $args['base'] }}-prev"><i class="las la-arrow-left"></i></div>
                <div class="button-next {{ $args['base'] }}-next"><i class="las la-arrow-right"></i></div>
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
        var space_between = {{ isset($args['space_between']) ? $args['space_between'] : 0 }};
        var loop = {{ isset($args['loop']) ? $args['loop'] : 'false' }};
        var keyboard_control = {{ isset($args['keyboard_control']) ? $args['keyboard_control'] : 'false' }};
        var auto_play = {{ isset($args['auto_play']) ? $args['auto_play'] : 'false' }};
        var autoplay_delay = {{ isset($args['autoplay_delay']) ? $args['autoplay_delay'] : 1500 }};
        var slides_per_view = {{ isset($args['slides_per_view']) ? $args['slides_per_view'] : 1 }};
        var centered_slides = {{ isset($args['centered_slides']) ? $args['centered_slides'] : 'false' }};
        var free_mode = {{ isset($args['free_mode']) ? $args['free_mode'] : 'false' }};
        var slider_speed = {{ isset($args['speed']) ? $args['speed'] : 1000 }};
        var effect = '{{ isset($args['effect']) ? $args['effect'] : '' }}';
        
        var autoplay_enable = ((typeof auto_play != "undefined") ? { delay: autoplay_delay } : false); 

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
            navigation: {
                nextEl: "."+swiper_class+"-next",
                prevEl: "."+swiper_class+"-prev",
            },
        });
    </script>
@endpush