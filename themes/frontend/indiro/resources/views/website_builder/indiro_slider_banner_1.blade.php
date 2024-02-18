<div class="main-slider1">
    <div class="swiper-container main-swiper1 banner-inner">
        <div class="swiper-wrapper">
        @if (isset($args['grouped']) && !empty($args['grouped']))
            @foreach ($args['grouped'] as $slide)
            @php
                if (isset($slide['image']) && !empty($slide['image'])) {
                    $image = asset('storage/page-images/magic-editor/'.$slide['image']);
                }else{
                    $image = asset('images/noimage.jpg');
                }
            @endphp
            <div class="swiper-slide overlay-black-light" style="background-image: url({{ $image }});">
                <div class="banner-content">
                    <div class="row">
                        <div class="col-lg-8 col-md-10">
                            <h1 class="title" data-swiper-parallax="-500">{{ isset($slide['title']) ? $slide['title'] : '' }}</h1>
                            <p data-swiper-parallax="-1000">{{ isset($slide['description']) ? $slide['description'] : '' }}</p>
                            @if (isset($args['read_more']) && $args['read_more'] == true)
                            <a data-swiper-parallax="-1500" href="{{ isset($args['read_more_page_id']) ? DzHelper::laraPageLink($args['read_more_page_id']) : 'javascript:void(0);' }}" class="btn btn-primary btn-icon m-r10 m-b10">{{ __('READ MORE') }} <i class="fas fa-arrow-right"></i></a>
                            @endif
                            @if (isset($args['get_in_touch']) && $args['get_in_touch'] == true)
                            <a data-swiper-parallax="-2000" href="{{ isset($args['get_in_touch_page_id']) ? DzHelper::laraPageLink($args['get_in_touch_page_id']) : 'javascript:void(0);' }}" class="btn btn-dark btn-icon m-r10 m-b10">{{ __('GET IN TOUCH') }} <i class="fas fa-arrow-right"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        </div>
        @if (isset($args['navigation']) && $args['navigation'] == true)
        <div class="swiper-button">
            <div class="swiper-button-prev"><i class="las la-angle-left"></i></div>
            <div class="swiper-button-next"><i class="las la-angle-right"></i></div>
        </div>
        @endif
    </div>
    @if (isset($args['pagination']) && $args['pagination'] == true)
    <div class="image-slider__pagination">
        <div class="image-slider__current">1</div>
        <div class="swiper-pagination swiper-pagination-slider1"></div>
        <div class="image-slider__total">1</div>
    </div>
    @endif

    
    <div class="swiper-container slider-thumbs-wraper main-swiper-thumb1">
        <div class="swiper-wrapper">
            @if (isset($args['grouped']) && !empty($args['grouped']))
                @foreach ($args['grouped'] as $slide)
                <div class="swiper-slide">
                    <div class="slider-thumbs overlay-black-dark">
                        <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$slide['image']) }}" alt="">
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>