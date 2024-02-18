<section class="content-inner about-sec bg-primary-light">
    <div class="container">
        <div class="row about-bx2 style-1 align-items-center">
            <div class="col-lg-6">
                <div class="dz-media">
                    <div class="row align-items-end">
                        <div class="col-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="image-box image-box-1">
                                <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image1']) }}" alt="{{ __('Image') }}">
                            </div>
                        </div>
                        <div class="col-6 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="image-box image-box-2">
                                <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image2']) }}" alt="{{ __('Image') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="image-box image-box-3">
                                <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image3']) }}" alt="{{ __('Image') }}">
                            </div>
                        </div>
                        <div class="col-6 wow fadeInUp" data-wow-delay="0.4s">
                            <div class="image-box image-box-4">
                                <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image4']) }}" alt="{{ __('Image') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 about-content ps-lg-5 m-b30 wow fadeInUp" data-wow-delay="0.6s">
                <div class="section-head">
                    <h6 class="sub-title text-primary">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</h6>
                    <h2 class="title">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
                    <p class="m-0 lh-base">{{ isset($args['description']) ? $args['description'] : '' }}</p>
                </div>
                @if (isset($args['learn_more_button']) && $args['learn_more_button'] == 'true' )
                    <a href="{{ isset($args['page_id']) ? DzHelper::laraPageLink($args['page_id']) : 'javascript:void(0);' }}" class="btn space-lg btn-gradient btn-shadow btn-primary wow fadeInUp" data-wow-delay="0.6s"><span>{{ isset($args['btn_text']) ? $args['btn_text'] : 'CONTACT US' }}</span></a>
                @endif
            </div>
        </div>
    </div>
    <img class="bg-shape1" src="{{ theme_asset('images/home-banner/shape1.png') }}" alt="">
    <img class="bg-shape2" src="{{ theme_asset('images/home-banner/shape3.png') }}" alt="">
    <img class="bg-shape3" src="{{ theme_asset('images/home-banner/shape3.png') }}" alt="">
    <img class="bg-shape4" src="{{ theme_asset('images/home-banner/shape3.png') }}" alt="">
</section>