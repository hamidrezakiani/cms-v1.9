<!-- Banner  -->
<div class="dz-bnr-inr style-1 text-center" data-text="{{ isset($args['title']) ? $args['title'] : '' }}" style="background-image:url({{ isset($args['image']) && Storage::exists('public/page-images/magic-editor/'.$args['image']) ? asset('storage/page-images/magic-editor/'.$args['image']) : theme_asset('images/banner/bg2.png') }});">
    <div class="container">
        <div class="dz-bnr-inr-entry">
            <h1>{{ isset($args['title']) ? $args['title'] : '' }}</h1>
            <!-- Breadcrumb Row -->
            <nav aria-label="breadcrumb" class="breadcrumb-row">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ isset($args['title']) ? $args['title'] : '' }}</li>
                </ul>
            </nav>
            <!-- Breadcrumb Row End -->
        </div>
    </div>
</div>
<!-- Banner End -->