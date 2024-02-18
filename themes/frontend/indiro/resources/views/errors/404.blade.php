@extends('layout.fullwidth')

@section('content')

    <div class="error-page overlay-black-light" style="background-image: url({{ theme_asset('images/bnr/bnr1.jpg') }});">
        <div class="error-inner text-center">
            <div class="dz_error" data-text="404">{{ __('404') }}</div>
            <h2 class="error-head">{{ __('We are sorry. But the page you are looking for cannot be found.') }}</h2>
            <a href="{{ url('/') }}" class="btn btn-primary btn-border white-border">{{ __('BACK TO HOMEPAGE') }}</a>
        </div>
    </div>
    
@endsection