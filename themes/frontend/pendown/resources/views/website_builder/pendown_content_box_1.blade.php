<div class="section-full bg-white content-inner">
	<div class="container">
		<div class="row justify-content-center ">
			<div class="col-lg-12 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
				<div class="dlab-media m-b50 " >
					<a href="javascript:void(0);">
						<img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image']) }}" alt="{{ __('Contact Image') }}">
					</a>
				</div>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				<div class="blog-post blog-single">
					<div class="dlab-info">
						<div class="dlab-post-text text mt-0">
							<h2><span>{{ isset($args['title']) ? $args['title'] : '' }}</span></h2>
							<p class="first-content">{{ isset($args['description']) ? $args['description'] : '' }}</p>
						</div>
						@if(isset($args['grouped']) && !empty($args['grouped']))
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
							<ul class="social-icon">
	                            @forelse($args['grouped'] as $icon)
		                            @if (!empty($icon))
		                            <li><a href="{{ isset($icon['social_link']) ? $icon['social_link'] : '#' }}" class="btn radius-xl">
										{!! isset($icon['icon']) ? $social_icons[$icon['icon']] : ''  !!}
									</a></li>
		                            @endif

								@empty
								@endforelse
							</ul>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>