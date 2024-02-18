<section class="content-inner overlay-black-dark" style="background-image:url({{ theme_asset('images/background/bg3.jpg') }});">
    <div class="container">
        <div class="row about-style5">
            <div class="col-lg-6 m-b30">
                <div class="about-media aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">  
                    <img class="m-b30" src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image']) }}" alt="">
                    <div class="video-box overlay-black-middle">
                        <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['video_box_image']) }}" alt="">
                        @if(isset($args['video_box']) && !empty($args['video_box']))
                        <a href="{{ isset($args['iframe'])  ? $args['iframe'] : 'javascript: void(0);' }}" class="popup-youtube play-btn1"><i class="fa fa-play"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6 m-b30">
                <div class="about-content">
                    <div class="section-head style-1 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
                        @if(isset($args['subtitle']))
                            <h6 class="sub-title text-white m-b10">{{ $args['subtitle'] }}</h6>
                        @endif
                        <h3 class="title m-b20 text-white">{{ isset($args['title']) ? $args['title'] : '' }}</h3>
                        <p class="text-white">{{ isset($args['description']) ? $args['description'] : '' }}</p>
                    </div>
                    @if(isset($args['grouped']) && !empty($args['grouped']))
                        <ul class="list-number-circle">
                            @forelse($args['grouped'] as $key => $feature)
                            <li data-text="{{ $key+1 }}" class="aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
                                <h3 class="text-white">{{ isset($feature['title']) ? $feature['title'] : '' }}</h3>
                                <p class="text-white">{{ isset($feature['description']) ? $feature['description'] : '' }}</p>
                            </li>
                            @empty
                            @endforelse
                        </ul>
                    @endif
                    @if(isset($args['read_more']) && !empty($args['read_more']))
                    <a href="{{ isset($args['read_more_page_id']) ? DzHelper::laraPageLink($args['read_more_page_id']) : 'javascript:void(0);' }}" class="btn btn-primary btn-icon">{{ __('READ MORE') }} <i class="fas fa-arrow-right"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>