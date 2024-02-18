<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
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
	
	<!-- PAGE TITLE HERE -->
	<title>{{ config('Site.title') ? config('Site.title') : __('W3CMS Laravel') }}</title>
	
	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="{{ theme_asset('css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ theme_asset('css/plugins.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ theme_asset('css/templete.css') }}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{ theme_asset('css/skin/black-white-dark.css') }}">

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
	<script src="{{ theme_asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script><!-- BOOTSTRAP.MIN JS -->
	<script src="{{ theme_asset('plugins/countdown/jquery.countdown.js') }}"></script><!-- COUNTDOWN.JS -->
	<script src="{{ theme_asset('js/custom.js') }}"></script><!-- CUSTOM FUCTIONS  -->
	<div class="site-nav-overlay js-nav" style="opacity: 0;"></div>
	<script src="{{ theme_asset('js/w3cms_frontend.js') }}"></script><!-- W3cms_Frontend JS -->
</body>
</html>