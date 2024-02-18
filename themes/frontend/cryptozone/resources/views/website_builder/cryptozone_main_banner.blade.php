<!-- Main Banner Start -->
<div class="main-bnr style-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <h1 class="wow fadeInUp" data-wow-delay="0.2s">{{ isset($args['title']) ? $args['title'] : '' }}</h1>
                <p class="text text-primary wow fadeInUp" data-wow-delay="0.4s">{{ isset($args['description']) ? $args['description'] : '' }}</p>
                @if (isset($args['learn_more_button']) && $args['learn_more_button'] == 'true' )
                    <a href="{{ isset($args['page_id']) ? DzHelper::laraPageLink($args['page_id']) : 'javascript:void(0);' }}" class="btn space-lg btn-gradient btn-shadow btn-primary wow fadeInUp" data-wow-delay="0.6s"><span>{{ isset($args['btn_text']) ? $args['btn_text'] : 'Get Started' }}</span></a>
                @endif
                <ul class="image-before">
                    <li class="left-img"><img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['left_image']) }}" class="main-img" alt="{{ __('Home-Banner-1') }}"></li>
                    <li class="right-img"><img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['right_image']) }}" class="main-img" alt="{{ __('Home-Banner-2') }}"></li>
                </ul>
            </div>
        </div>
    </div>
    <img class="bg-shape1" src="{{ theme_asset('images/home-banner/shape1.png') }}" alt="{{ __('Banner-Image-1') }}">
    <img class="bg-shape2" src="{{ theme_asset('images/home-banner/shape1.png') }}" alt="{{ __('Banner-Image-2') }}">
    <img class="bg-shape3" src="{{ theme_asset('images/home-banner/shape3.png') }}" alt="{{ __('Banner-Image-3') }}">
    <img class="bg-shape4" src="{{ theme_asset('images/home-banner/shape3.png') }}" alt="{{ __('Banner-Image-4') }}">
</div>
<!-- Main Banner End -->

