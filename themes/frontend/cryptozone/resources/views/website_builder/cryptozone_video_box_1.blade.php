<!-- video box section start -->
@if (isset($args['box_image']) && isset($args['video_link']))
<section class="content-inner p-0 bg-primary-light video-bx-wrapper">
    <img class="bg-shape1" src="{{ theme_asset('images/home-banner/shape1.png') }}" alt="">

    <div class="container wow fadeInUp" data-wow-delay="0.4s">
        <div class="video-bx style-1">
            <div class="video-media">
                <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['box_image']) }}" alt="{{ __('image') }}">
                <a href="{{ isset($args['video_link']) ? $args['video_link'] : '#'  }}" class="popup-youtube play-icon">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.25 3.75L23.75 15L6.25 26.25V3.75Z" stroke="#9467FE" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
@endif
<!-- video box section end -->