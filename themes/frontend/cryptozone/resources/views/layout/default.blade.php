<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	
	<!-- PAGE TITLE HERE -->
	<title>{{ !empty($seoMeta['title']) ? $seoMeta['title'] : config('Site.title') }}</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Meta Tags --}}
    @include('elements.meta')
    {{-- Meta Tags --}}

    <!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="canonical" href="{{ url()->current() }}" />
	
	<!-- FAVICONS ICON -->
	@if(Storage::exists('public/configuration-images/'.config('Site.favicon')))
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/configuration-images/'.config('Site.favicon')) }}">
    @else 
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.png') }}">
    @endif
	
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="{{ theme_asset('vendor/swiper/swiper-bundle.min.css') }}">
	<link rel="stylesheet" href="{{ theme_asset('vendor/magnific-popup/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ theme_asset('css/style.css') }}">
	<link href="{{ theme_asset('vendor/animate/animate.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/default-element.css') }}">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap">

</head>
<body>

	<!--*******************
        Preloader start
    ********************-->
    <!--*******************
        Preloader end
    ********************-->
	
	<div class="page-wraper">

		<!-- header -->
		@include('elements.header')
		<!-- header END -->
		
		<div class="page-content">

			@yield('content')

		</div>

		<!-- Footer -->
		@include('elements.footer')
		<!-- Footer END-->

		<!-- Bottom to top -->
		<button class="scroltop icon-up" type="button"><i class="fas fa-arrow-up"></i></button>

	</div>
	
	@stack('inline-scripts')

	<script> baseUrl = '{{ url('/') }}'; </script>
	<!-- JAVASCRIPT FILES ========================================= -->
	<script src="{{ theme_asset('js/jquery.min.js') }}"></script><!-- JQUERY -->
	<script src="{{ theme_asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script><!-- BOOTSTRAP JS -->
	<script src="{{ theme_asset('vendor/swiper/swiper-bundle.min.js') }}"></script><!-- SWIPER JS -->
	<script src="{{ theme_asset('js/dz.carousel.js') }}"></script><!-- CAROUSEL JS -->
	<script src="{{ theme_asset('vendor/magnific-popup/magnific-popup.js') }}"></script><!-- MAGNIFIC POPUP -->
	<script src="{{ theme_asset('vendor/wow/wow.js') }}"></script><!-- WOW JS -->
	<script src="{{ theme_asset('js/custom.js') }}"></script><!-- CUSTOM JS -->
	<script src="{{ theme_asset('js/w3cms_frontend.js') }}"></script><!-- W3cms_Frontend JS -->

  	@stack('inline-swiper')

</body>
</html>