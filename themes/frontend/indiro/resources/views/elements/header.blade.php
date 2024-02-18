<header class="site-header mo-left header-transparent style-1">
	<!-- Top Bar -->
	<div class="top-bar text-white">
		<div class="container">
			<div class="dz-topbar-inner d-flex justify-content-between align-items-center">
				<div class="dz-topbar-left">
					<p>{{ config('Site.office_time') }}</p>
				</div>
				<div class="dz-topbar-right">
					<ul>
						<li><i class="fas fa-phone-alt"></i> {{ __('Phone line:') }}  {{ config('Site.contact') }}</li>
						<li><i class="fas fa-envelope"></i> {{ config('Site.email') }}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Main Header -->
	<div class="sticky-header main-bar-wraper navbar-expand-lg">
		<div class="main-bar clearfix ">
			<div class="container clearfix">
				<!-- Website Logo -->
				<div class="logo-header mostion logo-white">
					<a href="{{ url('/') }}"><img src="{{ DzHelper::siteLogoLight() }}" alt="{{ __('Logo') }}"></a>
				</div>
				<!-- Nav Toggle Button -->
				<button class="navbar-toggler collapsed navicon justify-content-start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<!-- Extra Nav -->
				<div class="extra-nav">
					<div class="extra-cell">
						<a href="{{ url('/contact') }}" class="btn btn-primary btn-border d-sm-inline-flex d-none white-border">{{ __('CONTACT US') }}</a>
					</div>
				</div>
				<!-- Extra Nav -->
				
				<div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
					<div class="logo-header logo-dark">
						<a href="{{ url('/') }}"><img src="{{ DzHelper::siteLogoLight() }}" alt=""></a>
					</div>
					{{ DzHelper::nav_menu(
					  	array(
					 		'theme_location'  => 'primary',
					 		'menu_class'      => 'nav navbar-nav navbar navbar-left',
					  	)
					  ); }}
					<div class="dz-social-icon">
						<ul>
							<li><a class="fab fa-facebook-f" href="{{ config('Social.facebook') }}"></a></li>
							<li><a class="fab fa-twitter" href="{{ config('Social.twitter') }}"></a></li>
							<li><a class="fab fa-whatsapp" href="{{ config('Social.linkedin') }}"></a></li>
							<li><a class="fab fa-instagram" href="{{ config('Social.instagram') }}"></a></li>
						</ul>
					</div>	
				</div>
			</div>
		</div>
	</div>
	<!-- Main Header End -->
</header>