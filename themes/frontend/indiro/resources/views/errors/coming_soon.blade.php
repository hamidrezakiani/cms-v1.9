@extends('layout.fullwidth')

@section('content')

    <div class="dez-coming-soon style-3">
        <div class="bg-img" style="background-image:url({{ theme_asset('images/background/bg23.jpg') }});"></div>
        <div class="clearfix dez-coming-bx">
            <div class="dez-content">
                <div class="center-md">
                    <div class="logo top-left m-b30">
                        <a href="{{ url('/') }}"><img src="{{ asset('storage/configuration-images/'.config('Site.logo_white')) }}" width="180px" alt="{{ __('Logo') }}"></a>
                    </div>
                    <h2 class="dez-title mb-2">{{ __('COMING SOON') }}</h2>
                    <p class="text-white m-b30">{!! config('Site.comingsoon_message') !!}</p>
                    
                    
                    <div class="countdown-timer countdown-container" data-date="{!! config('Site.comingsoon_date') !!}">
                        <div class="clock">
                            <div class="clock-item clock-days countdown-time-value">
                                <div id="canvas-days" class="clock-canvas"></div>
                                <div class="text">
                                    <p class="val">{{ __('0') }}</p>
                                    <p class="type-days type-time" data-border-color="#fff">{{ __('Days') }}</p>
                                </div>
                            </div>
                            <div class="clock-item clock-hours countdown-time-value">
                                <div id="canvas-hours" class="clock-canvas"></div>
                                <div class="text">
                                    <p class="val">{{ __('0') }}</p>
                                    <p class="type-hours type-time" data-border-color="#fff">{{ __('Hours') }}</p>
                                </div>
                            </div>
                            <div class="clock-item clock-minutes countdown-time-value">
                                <div id="canvas-minutes" class="clock-canvas"></div>
                                <div class="text">
                                    <p class="val">{{ __('0') }}</p>
                                    <p class="type-minutes type-time" data-border-color="#fff">{{ __('Minutes') }}</p>
                                </div>
                            </div>
                            <div class="clock-item clock-seconds countdown-time-value">
                                <div id="canvas-seconds" class="clock-canvas"></div>
                                <div class="text">
                                    <p class="val">{{ __('0') }}</p>
                                    <p class="type-seconds type-time" data-border-color="#fff">{{ __('Seconds') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-right">
                <ul class="dez-social-icon">
                    <li><a class="fab fa-facebook-f" href="{{ config('Social.facebook') }}" ></a></li>
                    <li><a class="fab fa-twitter" href="{{ config('Social.twitter') }}" ></a></li>
                    <li><a class="fab fa-linkedin-in" href="{{ config('Social.linkedin') }}" ></a></li>
                    <li><a class="fab fa-instagram" href="{{ config('Social.instagram') }}" ></a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection