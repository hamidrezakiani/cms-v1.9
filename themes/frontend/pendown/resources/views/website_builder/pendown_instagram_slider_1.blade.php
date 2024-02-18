<div class="section-full">
	<div class="instra-line">
		<span class="sub-title">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</span>
		<h4 class="title">
			@php
                $social_icons = array(
                    'facebook'  => '<i class="fa fa-facebook-f"></i>',
                    'instagram' => '<i class="fa fa-instagram"></i>',
                    'whatsapp'  => '<i class="fa fa-whatsapp"></i>',
                    'twitter'   => '<i class="fa fa-twitter"></i>',
                    'youtube'   => '<i class="fa fa-youtube"></i>',
                    'linkedin'  => '<i class="fa fa-linkedin-in"></i>',
                    'reddit'    => '<i class="fa fa-reddit-alien"></i>',
                    'pinterest' => '<i class="fa fa-pinterest"></i>',
                    'google'    => '<i class="fa fa-google-plus-g"></i>'
                );
            @endphp
            {!! $social_icons[$args['icon']] !!}{{ isset($args['title']) ? $args['title'] : '' }}
        </h4>
	</div>
	<div class="swiper swiper-container {{ $args['base'] }}">
		<div class="swiper-wrapper">
			@forelse($args['grouped'] as $image)
			<div class="swiper-slide">
				<span data-exthumbimage="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$image['image']) }}" data-src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$image['image']) }}" class="check-km dlab-img-effect" title="{{ __('Title Come Here') }}">		
					<img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$image['image']) }}" alt="">
				</span>
			</div>
			@empty
			@endforelse
		</div>
	</div>
</div>

@push('inline-swiper')
    <script>
		'use strict';
        var swiper_class = '{{ $args['base'] }}';
        var space_between = {{ isset($args['space_between']) ? $args['space_between'] : 0 }};
        var loop = {{ isset($args['loop']) ? $args['loop'] : 'false' }};
        var keyboard_control = {{ isset($args['keyboard_control']) ? $args['keyboard_control'] : 'false' }};
        var auto_play = {{ isset($args['auto_play']) ? $args['auto_play'] : 'false' }};
        var autoplay_delay = {{ isset($args['autoplay_delay']) ? $args['autoplay_delay'] : 1500 }};
        var slides_per_view = {{ isset($args['slides_per_view']) ? $args['slides_per_view'] : 4 }};
        var centered_slides = {{ isset($args['centered_slides']) ? $args['centered_slides'] : 'false' }};
        var free_mode = {{ isset($args['free_mode']) ? $args['free_mode'] : 'false' }};
        var slider_speed = {{ isset($args['speed']) ? $args['speed'] : 1000 }};
        var effect = '{{ isset($args['effect']) ? $args['effect'] : '' }}';
		var grabCursor = '{{ isset($args['grabCursor']) ? $args['grabCursor'] : 'false' }}';
        
        var autoplay_enable = ((typeof auto_play != "undefined") ? { delay: autoplay_delay } : false);
		var breakpoint1 = {{ isset($args['breakpoint1']) ? $args['breakpoint1'] : 5 }};
        var breakpoint2 = {{ isset($args['breakpoint2']) ? $args['breakpoint2'] : 6 }};
        var breakpoint3 = {{ isset($args['breakpoint3']) ? $args['breakpoint3'] : 7 }};
        var breakpoint4 = {{ isset($args['breakpoint3']) ? $args['breakpoint3'] : 8 }};
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
        });
    </script>
@endpush