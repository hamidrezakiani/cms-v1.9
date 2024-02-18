<section class="content-inner bg-secondary" style="background-image:url({{ theme_asset('images/background/bg2.png') }});background-position:center;background-size:cover;">
    <div class="container">
        <div class="row about-style6">
            <div class="col-lg-6 m-b30 align-self-center aos-item" data-aos="fade-right" data-aos-duration="800" data-aos-delay="500">
                <div class="about-content">
                    <div class="section-head style-1">
                        @if(isset($args['subtitle']))<h6 class="sub-title text-primary m-b10">{{ $args['subtitle'] }}</h6>@endif
                        <h3 class="title m-b20 text-white">{{ isset($args['title']) ? $args['title'] : '' }}</h3>
                        <p class="text-white">{{ isset($args['description']) ? $args['description'] : '' }}</p>
                    </div>
                    @if (isset($args['read_more']) && $args['read_more'] == true)
                    <a href="{{ isset($args['read_more_page_id']) ? DzHelper::laraPageLink($args['read_more_page_id']) : 'javascript:void(0);' }}" class="btn btn-primary btn-icon">{{ __('READ MORE') }} <i class="fas fa-arrow-right"></i></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 m-b30 align-self-end">
                <div class="about-media aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">  
                    <div class="dz-media m-b40">
                        <img class="m-b30" src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['video_box_image']) }}" alt="">
                        @if (isset($args['iframe']))
                        <a href="{{ $args['iframe'] }}" class="popup-youtube play-btn2"><i class="fa fa-play"></i></a>
                        @endif
                    </div>
                    <div class="row m-b10">
                        @if (isset($args['grouped']) && !empty($args['grouped']))
                            @foreach ($args['grouped'] as $count)
                            <div class="col-4">
                                <div class="counter-style-2 m-b30 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                                    <div class="counter-num text-primary">
                                        <h2 class="counter text-primary">{{ isset($count['counting']) ? $count['counting'] : '' }}</h2>
                                        <small>{{ isset($count['extra_alpha']) ? $count['extra_alpha'] : '' }}</small>
                                    </div>
                                    <h5 class="counter-text text-white">{{ isset($count['title']) ? $count['title'] : '' }}</h5>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>