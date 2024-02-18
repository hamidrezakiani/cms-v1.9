<section class="content-inner overlay-white-middle" style="background-image: url({{ theme_asset('images/background/bg2.jpg') }});">
    <div class="container">
        <div class="row about-style1 align-items-center">
            <div class="col-lg-6 m-b30">
                <div class="row sp10 about-thumb">
                    <div class="col-sm-6 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                        <div class="split-box">
                            <div>
                                <img class="m-b30" src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image1']) }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="split-box">
                            <div>
                                <img class="m-b20 aos-item" src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image2']) }}" alt="" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
                            </div>
                        </div>
                        <div class="exp-bx aos-item"  data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
                            <div class="exp-head">
                                <div class="counter-num">
                                    <h2 class="counter">{{ isset($args['exp_number']) ? $args['exp_number'] : '' }}</h2>
                                    <small>{{ isset($args['extra_alpha']) ? $args['extra_alpha'] : '' }}</small>
                                </div>
                                <h6 class="title">{{ isset($args['exp_title']) ? $args['exp_title'] : '' }}</h6>
                            </div>
                            @if(isset($args['grouped']) && !empty($args['grouped']))
                            <div class="exp-info">
                                <ul class="list-check primary">
                                    @forelse($args['grouped'] as $slide)
                                    <li>{{ $slide['title'] }}</li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 m-b30 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
                <div class="about-content">
                    <div class="section-head style-1">
                        @if(isset($args['subtitle']))<h6 class="sub-title text-primary m-b10">{{ $args['subtitle'] }}</h6>@endif
                        <h2 class="title">{{ isset($args['title']) ? $args['title'] : '' }} </h2>
                        <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
                    </div>
                    @if(isset($args['read_more']) && !empty($args['read_more']))
                    <a href="{{ isset($args['read_more_page_id']) ? DzHelper::laraPageLink($args['read_more_page_id']) : 'javascript:void(0);' }}" class="btn btn-primary btn-icon">{{ __('READ MORE') }} <i class="fas fa-arrow-right"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>