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
	
	<!-- STYLESHEETS -->
	<link rel="stylesheet" href="{{ theme_asset('vendor/animate/animate.css') }}">
	<link rel="stylesheet" href="{{ theme_asset('vendor/magnific-popup/magnific-popup.min.css') }}">
	<link rel="stylesheet" href="{{ theme_asset('vendor/swiper/swiper-bundle.min.css') }}">
	<link rel="stylesheet" href="{{ theme_asset('vendor/rangeslider/rangeslider.css') }}">
	<link rel="stylesheet" href="{{ theme_asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/default-element.css') }}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{ theme_asset('css/skin/skin-1.css') }}">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body id="bg" data-anm=".anm">

	<div class="page-wraper">

		<!-- header -->
		@include('elements.header')
		<!-- header END -->
		
		<div class="page-content bg-white">

			@yield('content')

		</div>

		<!-- Footer -->
		@include('elements.footer')
		<!-- Footer END-->

		<button class="scroltop fa fa-chevron-up" ></button>

	</div>


	<!-- JAVASCRIPT FILES ========================================= -->
	<script>
		var dynamicDate = "{{ config('Site.comingsoon_date') }}";
	</script>
	<script src="{{ theme_asset('js/jquery.min.js') }}"></script>
	@stack('inline-scripts')
	<script src="{{ theme_asset('vendor/wow/wow.js') }}"></script>
	<script src="{{ theme_asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ theme_asset('vendor/magnific-popup/magnific-popup.js') }}"></script>
	<script src="{{ theme_asset('vendor/counter/waypoints-min.js') }}"></script>
	<script src="{{ theme_asset('vendor/counter/counterup.min.js') }}"></script>
	<script src="{{ theme_asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
	<script src="{{ theme_asset('vendor/rangeslider/rangeslider.js') }}"></script>
	<script src="{{ theme_asset('vendor/anm/anm.js') }}"></script>
	<script src="{{ theme_asset('js/custom.js') }}"></script>
	<script src="{{ theme_asset('js/w3cms_frontend.js') }}"></script> <!-- W3cms_Frontend JS -->

	@stack('inline-swiper')
	
</body>
</html>