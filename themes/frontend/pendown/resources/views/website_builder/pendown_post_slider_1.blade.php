@php
    $blogs = HelpDesk::elementPostsByArgs($args);
@endphp

<div class="section-full bg-white wow fadeIn post-carousel-box" data-wow-duration="2s" data-wow-delay="0.9s">
	<div class="container-fluid">
		<div class="swiper swiper-container {{ $args['base'] }}">
			<div class="swiper-wrapper">
				@forelse($blogs as $blog)
				<div class="swiper-slide">
					<div class="dlab-card blog-grid overlay-post left">
						<div class="dlab-media">
                            <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
						</div>
						<div class="dlab-info">
							<div class="dlab-meta">
								<ul>
									<li class="post-tag"><a href="javascript: void(0);">{{ isset($blog->blog_categories[0]) ? $blog->blog_categories[0]['title'] : '' }}</a></li>
								</ul>
							</div>
							<h4 class="dlab-title"><a href="{{ DzHelper::laraBlogLink($blog->id) }}">{{ isset($blog->title) ? Str::limit($blog->title, 25, ' ...') : '' }}</a></h4>
						</div>
					</div>
				</div>
				@empty
	            @endforelse
			</div>
		</div>
	</div>
</div>

@push('inline-swiper')
    <script>
		'use strict';
        var swiper_class = '{{ $args['base'] }}';
        var space_between = {{ isset($args['space_between']) ? $args['space_between'] : 10 }};
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
		var breakpoint1 = {{ isset($args['breakpoint1']) ? $args['breakpoint1'] : 2 }};
        var breakpoint2 = {{ isset($args['breakpoint2']) ? $args['breakpoint2'] : 2 }};
        var breakpoint3 = {{ isset($args['breakpoint3']) ? $args['breakpoint3'] : 3 }};
        var breakpoint4 = {{ isset($args['breakpoint3']) ? $args['breakpoint3'] : 4 }};
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