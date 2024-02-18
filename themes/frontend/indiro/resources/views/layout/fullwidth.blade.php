<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="description" content="{{ __('Indiro - Factory & Industrial HTML Template') }}">
	<meta property="og:title" content="{{ __('Indiro - Factory & Industrial HTML Template') }}">
	<meta property="og:description" content="{{ __('Industry – Factory & Industrial HTML Template is particularly designed for factory, industry, architecture, plants, mechanical, power and energy Business Template.') }}">
	<meta property="og:image" content="https://w3cms.dexignzone.com/laravel/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON -->
	@if(Storage::exists('public/configuration-images/'.config('Site.favicon')))
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/configuration-images/'.config('Site.favicon')) }}">
    @else 
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.png') }}">
    @endif
	
	<!-- PAGE TITLE HERE -->
	<title>{{ config('Site.title') ? config('Site.title') : __('W3CMS Laravel') }}</title>
	
	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="{{ theme_asset('css/style.css') }}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{ theme_asset('css/skin/skin-1.css') }}">


	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

</head>
<body id="bg">
	<div class="page-wraper">

		@yield('content')

	</div>

	<script>
		var dynamicDate = "{{ config('Site.comingsoon_date') }}";
	</script>
	<!-- JAVASCRIPT FILES ========================================= -->
	<script src="{{ theme_asset('js/jquery.min.js') }}"></script><!-- JQUERY.MIN JS -->
	<script src="{{ theme_asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
	<script src="{{ theme_asset('vendor/countdown/kinetic.js') }}"></script><!-- FORM JS -->
	<script src="{{ theme_asset('vendor/countdown/jquery.final-countdown.js') }}"></script><!-- FORM JS -->
	<script src="{{ theme_asset('js/custom.js') }}"></script><!-- CUSTOM FUCTIONS  -->
	<div class="site-nav-overlay js-nav" style="opacity: 0;"></div>
	<script src="{{ theme_asset('js/w3cms_frontend.js') }}"></script> <!-- W3cms_Frontend JS -->
</body>
</html>