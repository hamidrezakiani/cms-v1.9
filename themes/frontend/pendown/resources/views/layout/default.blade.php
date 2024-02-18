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
	<link rel="stylesheet" href="{{ theme_asset('plugins/swiper/swiper-bundle.min.css') }}">
	<link rel="stylesheet" href="{{ theme_asset('css/plugins.css') }}">
	<link rel="stylesheet" href="{{ theme_asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ theme_asset('css/templete.css') }}">
	<link rel="stylesheet" href="{{ asset('css/default-element.css') }}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{ theme_asset('css/skin/black-white-dark.css') }}">

</head>
<body id="bg">
	<div class="page-wraper">

		<!-- header -->
        @include('elements.header')
        <!-- header END -->
		
		<!-- Content -->
		<div class="page-content bg-white">
			@yield('content')
		</div>
		<!-- Content END-->

		<!-- Footer -->
		@include('elements.footer')
		<!-- Footer END-->

    	<button class="scroltop fa fa-chevron-up" ></button>

	</div>


	<script>
		var dynamicDate = "{{ config('Site.comingsoon_date') }}";
	</script>
	<!-- JAVASCRIPT FILES ========================================= -->
	<script src="{{ theme_asset('js/jquery.min.js') }}"></script><!-- JQUERY.MIN JS -->
	@stack('inline-scripts')
	<script src="{{ theme_asset('plugins/wow/wow.js') }}"></script><!-- WOW JS -->
	<script src="{{ theme_asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
	<script src="{{ theme_asset('plugins/owl-carousel/owl.carousel.js') }}"></script>
	<script src="{{ theme_asset('plugins/lightgallery/js/lightgallery-all.min.js') }}"></script><!-- Lightgallery -->
	<script src="{{ theme_asset('plugins/swiper/swiper-bundle.min.js') }}"></script>
	<script src="{{ theme_asset('js/custom.min.js') }}"></script><!-- CUSTOM FUCTIONS  -->
	<script src="{{ theme_asset('js/dz.carousel.min.js') }}"></script><!-- SORTCODE FUCTIONS -->
	<script src="{{ theme_asset('js/w3cms_frontend.js') }}"></script><!-- W3cms_Frontend JS -->

	@stack('inline-swiper')
</body>
</html>