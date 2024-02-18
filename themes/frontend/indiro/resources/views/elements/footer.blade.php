<footer class="site-footer style-2" id="footer">
	<div class="footer-top" style="background-image:url({{ theme_asset('images/background/bg2.png') }});">
        <div class="container">
			<div class="row m-b40 m-md-b10">
				<div class="col-xl-3 col-lg-3 col-sm-6 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
					<div class="widget widget_about">
						<div class="footer-logo logo-white">
							<a href="{{ url('/') }}"><img width="180px" src="{{ DzHelper::siteLogolight() }}" alt="{{ __('Site Logo') }}"/></a> 
						</div>
						<p>{!! config('Site.biography') !!}</p>
						<div class="dz-social-icon">
							<ul>
								<li><a target="_blank" class="fab fa-facebook-f" href="{{ config('Social.facebook') }}"></a></li>
								<li><a target="_blank" class="fab fa-twitter" href="{{ config('Social.twitter') }}"></a></li>
								<li><a target="_blank" class="fab fa-linkedin-in" href="{{ config('Social.linkedin') }}"></a></li>
								<li><a target="_blank" class="fab fa-instagram" href="{{ config('Social.instagram') }}"></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-sm-6 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
					<div class="widget">
						<h4 class="footer-title">{{ __('QUICK CONTACT') }}</h4>
						<div class="call-box2 m-b20"><span><i class="fas fa-phone"></i></span>{{ config('Site.contact') }}</div>
						<p>{{ config('Site.location') }}</p>
					</div>
				</div>
				<div class="col-xl-2 col-lg-2 col-sm-4 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
					<div class="widget widget_services">
						<h4 class="footer-title">{{ __('COMPANY') }}</h4>
						{{ DzHelper::nav_menu(
						  	array(
						 		'theme_location'  => 'footer',
						 		'menu_class'      => ' ',
						  	)
						  ); }}
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-sm-8 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="800">
					{{ DzHelper::recentBlogs( array('limit'=>2, 'order'=>'asc', 'orderby'=>'created_at') ) }}
				</div>
			</div>
			<div class="footer-info aos-item" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="100">
				<div class="row">
					<div class="col-lg-4">
						<div class="dz-media">
							<img src="{{ theme_asset('images/about/about23.jpg') }}" alt="">
							<a href="https://www.youtube.com/watch?v=_FRZVScwggM" class="popup-youtube play-btn1"><i class="fa fa-play"></i></a>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="info-right">
							<ul class="service-info">
								<li>
									<h4 class="title">{{ __('EMAIL US') }}</h4>
									<p>{{ config('Site.email') }}</p>
								</li>
								<li>
									<h4 class="title">{{ __('OPENING HOURS') }}</h4>
									<p>{{ config('Site.office_time') }}</p>
								</li>
							</ul>
							<a href="{{ url('/contact') }}" class="btn btn-white sechedule-btn">{{ __('CONTACT US') }}</a>
						</div>
					</div>
				</div>
			</div>
			
        </div>
    </div>
    <!-- footer bottom part -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center"> 
					<span class="copyright-text">{!! config('Site.copyright') !!}</span> 
				</div>
            </div>
        </div>
    </div>
</footer> 