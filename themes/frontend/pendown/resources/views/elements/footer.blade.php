<footer class="site-footer wow fadeIn" data-wow-duration="2s" data-wow-delay="0.8s">
    <div class="footer-top">
        <div class="container">
			<div class="row">
				<div class="col-md-4 align-self-center">		
					{{ DzHelper::nav_menu(
					  	array(
					 		'theme_location'  => 'footer',
					 		'menu_class'      => 'footer-link m-b0 p-l0',
					  	)
					  ); }}				
				</div>
				<div class="col-md-4">
					<div class="footer-logo">
						<a href="{{ url('/') }}"><img src="{{ DzHelper::siteLogoLight() }}" alt=""/></a>
					</div>
				</div>
				<div class="col-md-4 align-self-center">
					<ul class="social-icon m-b0 p-l0">
						<li><a href="{{ config('Social.instagram') }}" class="btn radius-xl"><i class="fa fa-instagram"></i></a></li>
						<li><a href="{{ config('Social.twitter') }}" class="btn radius-xl"><i class="fa fa-twitter"></i></a></li>
						<li><a href="{{ config('Social.facebook') }}" class="btn radius-xl"><i class="fa fa-facebook"></i></a></li>
						<li><a href="{{ config('Social.linkedin') }}" class="btn radius-xl"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
    </div>
	<div class="footer-bottom">
		<div class="container">
			<p>{!! config('Site.copyright') !!}</p>
		</div>
	</div>
</footer>