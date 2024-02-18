<section class="content-inner" style="background-image:url({{ theme_asset('images/background/bg1.png') }});background-position:bottom;background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-b30">
                <div class="split-box">
                    <div class="about-thumb p-r15 p-md-r0 aos-item" data-aos="fade-right" data-aos-duration="800" data-aos-delay="500"> 
                        <img class="m-b30" src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image']) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-7 m-b30 align-self-center">
                <div class="about-content">
                    <div class="section-head style-1 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                        @if(isset($args['subtitle']))<h6 class="sub-title text-primary m-b10">{{ $args['subtitle'] }}</h6>@endif
                        <h2 class="title m-b20">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
                    </div>
                    <div class="row m-b10">
                        <div class="col-md-8 m-b30 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                            <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
                            @if(isset($args['read_more']) && !empty($args['read_more']))
                            <a href="{{ isset($args['read_more_page_id']) ? DzHelper::laraPageLink($args['read_more_page_id']) : 'javascript:void(0);' }}" class="btn btn-primary btn-icon">{{ __('READ MORE') }} <i class="fas fa-arrow-right"></i></a>
                            @endif
                        </div>
                        <div class="col-md-4">
                            @if(isset($args['grouped']) && !empty($args['grouped']))
                            <ul class="list-square-box">
                                @forelse($args['grouped'] as $feature)
                                <li class="aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
                                    <h4>{{ isset($feature['title']) ? $feature['title'] : '' }}</h4>
                                    <p>{{ isset($feature['description']) ? $feature['description'] : '' }}</p>
                                </li>
                                @empty
                                @endforelse
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>