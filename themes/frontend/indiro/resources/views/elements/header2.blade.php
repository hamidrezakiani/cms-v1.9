<header class="site-header mo-left header-transparent header-sidenav-1">
	<!-- main header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix">
            <div class="container-fluid">
				<div class="header-content-bx">
					<!-- website logo -->
					<div class="logo-header logo-white">
						<a href="{{ url('/') }}"><img src="{{ DzHelper::siteLogoLight() }}" alt=""/></a>
					</div>
					<div class="logo-header logo-dark">
						<a href="{{ url('/') }}"><img src="{{ DzHelper::siteLogo() }}" alt=""/></a>
					</div>
					<div class="service-list">
						<ul>
							<li>
								<i class="la la-phone"></i>
								<span>{{ __('Make A Call') }}</span>
								<h4 class="title">{{ config('Site.contact') }}</h4>
							</li>
							<li>
								<i class="la la-clock-o"></i>
								<span>{{ __('Email Address') }}</span>
								<h4 class="title">
									<a class="text-white" href="{{ __('https://mail.google.com/mail/?view=cm&to=') }}{{ config('Site.email') }}" target="_blank">{{ config('Site.email') }}</a>
								</h4>
							</li>
							<li>
								<i class="la la-map"></i>
								<span>{{ __('Location') }}</span>
								<h4 class="title">{{ Str::limit(config('Site.location'), 25, ' ...') }}</h4>
							</li>
						</ul>
					</div>
					<div class="extra-nav">
						<div class="extra-cell">
							<ul>
								<li class="search-btn">
									<a href="javascript:void(0);" class="menu-btn">
										<span></span>
										<span></span>
										<span></span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="header-nav navbar-collapse full-sidenav navbar">
						<div class="flsbg">
							<span class="bg-wrap">
								<span></span>
							</span>
							<span class="bg-wrap">
								<span></span>
							</span>
							<span class="bg-wrap">
								<span></span>
							</span>
						</div>
						<div class="container">
							<div class="row">
								<div class="col-lg-6">
									<div class="logo-header logo-dark">
										<a href="{{ url('/') }}"><img src="{{ DzHelper::siteLogo() }}" alt=""></a>
									</div>
									{{ DzHelper::nav_menu(
									  	array(
									 		'theme_location'  => 'primary',
									 		'menu_class'      => 'nav navbar-nav',
									  	)
									  ); }}
								</div>
								<div class="col-lg-6">
									<div class="service-list">
										<ul>
											<li>
												<i class="la la-phone"></i>
												<span>{{ __('Make A Call') }}</span>
												<h4 class="title">{{ config('Site.contact') }}</h4>
											</li>
											<li>
												<i class="far fa-envelope"></i>
												<span>{{ __('Email Address') }}</span>
												<h4 class="title">{{ config('Site.email') }}</h4>
											</li>
											<li>
												<i class="la la-map"></i>
												<span>{{ __('Location') }}</span>
												<h4 class="title">{{ config('Site.location') }} </h4>
											</li>
										</ul>
									</div>
									<div class="social-menu">
										<ul>
											<li><a class="fab fa-facebook-f" href="{{ config('Social.facebook') }}"></a></li>
											<li><a class="fab fa-twitter" href="{{ config('Social.twitter') }}"></a></li>
											<li><a class="fab fa-linkedin" href="{{ config('Social.linkedin') }}"></a></li>
											<li><a class="fab fa-instagram" href="{{ config('Social.instagram') }}"></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
    <!-- main header END -->
</header>