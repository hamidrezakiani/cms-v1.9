<!-- Why Trust Us Start -->
<section class="clearfix section-wrapper1 bg-primary-light">
    <div class="container">
        <div class="content-inner-1">
            <div class="section-head text-center">
                <h6 class="sub-title text-primary">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</h6>
                <h2 class="title">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
                <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
            </div>
            @if(isset($args['grouped']) && !empty($args['grouped']))
            <div class="row">
                @foreach($args['grouped'] as $icon_bx)
                <div class="col-lg-6 m-b30 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="icon-bx-wraper style-2">
                        <div class="icon-media">
                            <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$icon_bx['icon']) }}" alt="{{ __('icon') }}">
                        </div>
                        <div class="icon-content">
                            <h4 class="title">{{ isset($icon_bx['title']) ? $icon_bx['title'] : '' }}</h4>
                            <p>{{ isset($icon_bx['description']) ? $icon_bx['description'] : '' }}</p>
                            @if (isset($args['learn_more_button']) && $args['learn_more_button'] == 'true' )
                                <a href="{{ isset($args['page_id']) ? DzHelper::laraPageLink($args['page_id']) : 'javascript:void(0);' }}" class="btn space-lg btn-gradient btn-shadow btn-primary wow fadeInUp"><span>{{ isset($args['btn_text']) ? $args['btn_text'] : 'Get Started' }}</span></a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
    <img class="bg-shape1" src="{{ theme_asset('images/home-banner/shape1.png') }}" alt="">
</section>
<!-- Why Trust Us End -->