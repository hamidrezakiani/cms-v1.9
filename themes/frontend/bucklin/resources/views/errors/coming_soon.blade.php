@extends('layout.default')

@section('content')

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- Error Page -->
        <div class="section-full content-inner-2">
            <div class="container">
                <div class="error-page text-center">
                    <div class="dz_error">{{ __('Coming soon') }}</div>
                    <h2 class="error-head">{!! config('Site.comingsoon_message') !!}</h2>
                </div>
            </div>
        </div>
        <!-- Error Page End -->
    </div>
    <!-- Content END-->
@endsection
