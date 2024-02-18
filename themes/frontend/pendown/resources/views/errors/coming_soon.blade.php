@extends('layout.fullwidth')

@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner END -->
		<div class="content-block">
            <!-- About Us -->
            <div class="section-full bg-white content-inner-2 coming-soon overlay-black-light" style="background-image:url({{ theme_asset('images/banner/pic1.jpg') }}); background-size:cover;">
                <div class="container">
					<div class="text-center">
						<div class="cs-logo">
							<div class="logo"><img src="{{ DzHelper::siteLogoLight() }}" alt=""/></div>
						</div>
						<div class="cs-title">{{ __('Coming Soon') }}</div>
						<div class="countdown text-center">
                            <div class="date"><span class="time days"></span>
                                <span>{{ __('Days') }}</span>
                            </div>
                            <div class="date"><span class="time hours"></span>
                                <span>{{ __('Hours') }}</span>
                            </div>
                            <div class="date"><span class="time mins"></span>
                                <span>{{ __('Minutess') }}</span>
                            </div>
                            <div class="date"><span class="time secs"></span>
                                <span>{{ __('Second') }}</span>
                            </div>
                        </div>
						<ul class="countdown-social">
							<li><a href="{{ config('Social.facebook') }}" class="fa fa-facebook"></a></li>
							<li><a href="{{ config('Social.twitter') }}" class="fa fa-twitter"></a></li>
							<li><a href="{{ config('Social.linkedin') }}" class="fa fa-linkedin"></a></li>
							<li><a href="{{ config('Social.instagram') }}" class="fa fa-instagram"></a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- About Us End -->
        </div>
		<!-- contact area END -->
    </div>
    <!-- Content END-->
@endsection