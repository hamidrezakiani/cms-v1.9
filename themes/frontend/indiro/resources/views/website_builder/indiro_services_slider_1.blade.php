<section class="content-inner-7 overflow-hidden">
	<div class="container-fluid p-lg-0">
		<div class="row spno">
			<div class="col-lg-4 align-self-center px-lg-3 px-0 mb-lg-0 mb-4 aos-item" data-aos="fade-right" data-aos-duration="800" data-aos-delay="500">
				<div class="m-l60 m-r60 m-lg-l20 m-lg-r20 m-md-l0 m-md-r0">
					<div class="section-head style-1">
						@if(isset($args['subtitle']))<h6 class="sub-title text-primary m-b10">{{ $args['subtitle'] }}</h6>@endif
						<h2 class="title m-b20">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
						<p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
					</div>
					@if(isset($args['navigation']) && !empty($args['navigation']))
					<div class="swiper-button">
						<div class="btn-prev {{ $args['base'] }}-prev"><i class="las la-angle-left"></i></div>
						<div class="btn-next {{ $args['base'] }}-next"><i class="las la-angle-right"></i></div>
					</div>
					@endif
				</div>
			</div>
			@if(isset($args['services']) && !empty($args['services']))
			@php
				$blogs = HelpDesk::getCptPostsBySlug($args['services']);
			@endphp	
			<div class="col-lg-8 aos-item swiper-portfolio-1" data-aos="fade-left" data-aos-duration="800" data-aos-delay="500">
				<div class="swiper swiper-container  {{ $args['base'] }}">
					<div class="swiper-wrapper">
						@forelse($blogs as $blog)
						<div class="swiper-slide">
							<div class="dz-box style-1">
							@php
								$blogMeta = HelpDesk::getPostMeta($blog->id, 'total_projects');
							@endphp
								<div class="dz-media">
									<img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
								</div>
								<div class="dz-info">
									<h3 class="title m-b10"><a href="#">{{ $blog->title }}</a></h3>
									<h6 class="sub-title text-primary">{{ $blogMeta }}</h6>
								</div>
							</div>
						</div>	
						@empty
						@endforelse

					</div>
					
				</div>	
			</div>
			@endif
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