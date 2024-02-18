@extends('layout.fullwidth')

@section('content')

    <div class="error-page overlay-black-light" style="background-image: url({{ theme_asset('images/bnr/bnr1.jpg') }});">
        <div class="error-inner text-center">
            <div class="dz_error" data-text="503">{{ __('503') }}</div>
            <h2 class="error-head">{{ __('UNDER MAINTENANCE') }}</h2>
            <p class="error-head">{!! config('Site.maintenance_message') !!}</p>
        </div>
    </div>
    
@endsection