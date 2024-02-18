<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="description" content="{{ __('CryptoZone - Crypto Trading HTML Template') }}">
    <meta property="og:title" content="{{ __('CryptoZone - Crypto Trading HTML Template') }}">
    <meta property="og:description" content="{{ __('CryptoZone - Crypto Trading HTML Template') }}">
    <meta property="og:image" content="">
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

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ theme_asset('css/style.css') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap">

</head>
<body class="vh-100">

    <div class="content-block">
        <div class="section-full coming-soon overlay-black-dark" style="background-image:url({{ theme_asset('images/background/bg2.jpg') }}); background-size:cover;">
            <div class="container">
                <div class="text-center">
                    <div class="cs-logo">
                        <div class="logo">
                            <img class="mb-3" src="{{ asset('storage/configuration-images/'.config('Site.logo_white')) }}" alt="{{ __('Site Logo') }}">
                        </div>
                    </div>
                    <h2 class="error-head text-lowercase text-white mb-0">{!! config('Site.comingsoon_message') !!}</h2>
                    <div class="cs-title">{{ __('Coming Soon') }}</div>

                    <div class="countdown text-center">
                        <div class="date"><span class="time days"></span>
                            <span>{{ __('Days') }}</span>
                        </div>
                        <div class="date"><span class="time hours"></span>
                            <span>{{ __('Hours') }}</span>
                        </div>
                        <div class="date"><span class="time mins"></span>
                            <span>{{ __('Minutes') }}</span>
                        </div>
                        <div class="date"><span class="time secs"></span>
                            <span>{{ __('Seconds') }}</span>
                        </div>
                    </div>
                    <ul class="countdown-social">
                        <li><a target="_blank" class="fab fa-facebook-f" href="{{ config('Social.facebook') }}"></a></li>
                        <li><a target="_blank" class="fab fa-twitter" href="{{ config('Social.twitter') }}"></a></li>
                        <li><a target="_blank" class="fab fa-linkedin-in" href="{{ config('Social.linkedin') }}"></a></li>
                        <li><a target="_blank" class="fab fa-instagram" href="{{ config('Social.instagram') }}"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <script>
		// $dynamicDate is the dynamic value from the database
		var dynamicDate = "{{ config('Site.comingsoon_date') }}";
	</script>
    
    <!-- Required vendors -->
    <script src="{{ theme_asset('js/jquery.min.js') }}"></script><!-- JQUERY.MIN JS -->
    <script src="{{ theme_asset('vendor/countdown/jquery.countdown.js') }}"></script><!-- COUNTDOWN FUCTIONS  -->
    <script src="{{ theme_asset('js/w3cms_frontend.js') }}"></script><!-- W3cms_Frontend JS -->

</body>
</html>