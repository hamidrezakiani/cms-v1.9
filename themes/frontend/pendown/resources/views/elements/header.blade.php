<header class="site-header mo-left header-full header border-top-primary">
		<div class="top-bar">
			<div class="container-fluid">
				<div class="row d-flex justify-content-between align-items-center">
					<div class="dlab-topbar-left">
						<ul>
							<li>{{ date("l, F j, Y ") }}</li>
						</ul>
					</div>
					<div class="dlab-topbar-right">
						<ul>			
							<li class="follow-us">
								<ul>
									<li class="follow-title">{{ __('Follow Us') }}</li>
									<li><a href="{{ config('Social.instagram') }}"><i class="fa fa-instagram"></i></a></li>
									<li><a href="{{ config('Social.twitter') }}"><i class="fa fa-twitter"></i></a></li>
									<li><a href="{{ config('Social.facebook') }}"><i class="fa fa-facebook"></i></a></li>
									<li><a href="{{ config('Social.linkedin') }}"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</li>	
						</ul>	
					</div>
				</div>
			</div>
		</div>
		<!-- main header -->
		<div class="sticky-header main-bar-wraper navbar-expand-lg">
			<div class="main-bar clearfix ">
				<div class="container-fluid">
					<!-- website logo -->
					<div class="logo-header mostion">
						<a href="{{ url('/') }}"><img src="{{ DzHelper::siteLogoLight() }}" alt="{{ __('Logo') }}"></a>
					</div>
					
					<!-- nav toggle button -->
					<button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					
					<!-- extra nav -->
					<div class="extra-nav">
						<div class="extra-cell">
							<ul>
								<li class="search-btn">
									<a id="quik-search-btn" href="javascript:;"><i class="ti-search m-r10"></i><span>{{ __('Search') }}</span></a>
								</li>
								<li>
									<a class="btn secondry radius-no" href="{{ url('/contact') }}">{{ __('Contact Us') }}</a>
								</li>
							</ul>
						</div>
					</div>
					
					<!-- Quik search -->
					<div class="dlab-quik-search">
						<form method="get" action="{{ route('permalink.search') }}">
							<input name="s" value="" type="text" class="form-control" placeholder="{{ __('Search...') }}" autocomplete="off">
							<span id="quik-search"><i class="ti-search"></i></span>
						</form>
						<span class="search-remove" id="quik-search-remove"><i class="ti-close"></i></span>
					</div>
					
					<!-- main nav -->
					<div class="header-nav navbar-collapse collapse justify-content-left" id="navbarNavDropdown">
						<div class="logo-header">
							<a href="{{ url('/') }}"><img src="{{ DzHelper::siteLogoLight() }}" alt="{{ __('Logo') }}"></a>
						</div>
						{{ DzHelper::nav_menu(
						  	array(
						 		'theme_location'  => 'primary',
						 		'menu_class'      => 'nav navbar-nav',
						  	)
						); }}
					</div>
				</div>
			</div>
		</div>
	</header>