<section class="content-inner-6">
    <div class="container">
        <div class="section-head style-1 text-center">
            @if(isset($args['subtitle']))<h6 class="sub-title text-primary m-b10">{{ $args['subtitle'] }}</h6>@endif
            <h2 class="title">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
            <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
        </div>
        <div class="swiper swiper-container {{ $args['base'] }}">
            <div class="swiper-wrapper">
                @if(isset($args['grouped']) && !empty($args['grouped']))
                    @forelse($args['grouped'] as $slide)
                    <div class="swiper-slide">
                        <div class="clients-logo aos-item" data-aos="fade-in" data-aos-duration="800" data-aos-delay="100">
                            <img class="m-b30" src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$slide['image']) }}" alt="">
                        </div>
                    </div>
                    @empty
                    @endforelse
                @endif
            </div>
        </div>
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
        var slides_per_view = {{ isset($args['slides_per_view']) ? $args['slides_per_view'] : 3 }};
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
        });
    </script>
@endpush