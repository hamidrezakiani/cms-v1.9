<section class="content-inner pricing-plan-wrapper bg-light">
    <img class="bg-shape2" src="{{ theme_asset('images/home-banner/shape1.png') }}" alt="">
    <img class="bg-shape3" src="{{ theme_asset('images/home-banner/shape1.png') }}" alt="">
    <img class="bg-shape1" src="{{ theme_asset('images/home-banner/shape3.png') }}" alt="">
    <img class="bg-shape4" src="{{ theme_asset('images/home-banner/shape3.png') }}" alt="">
    <img class="bg-shape5" src="{{ theme_asset('images/home-banner/shape3.png') }}" alt="">
    <div class="container">
        <div class="section-head text-center">
            <h6 class="sub-title text-primary">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</h6>
            <h2 class="title">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
            <p class="m-0 lh-base">{{ isset($args['description']) ? $args['description'] : '' }}</p>
        </div>
        <div class="row justify-content-center">

            @if(isset($args['grouped']) && !empty($args['grouped']))
                @foreach($args['grouped'] as $pricing_bx)

                <div class="col-xl-4 col-lg-6 col-md-6 m-b30">
                    <div class="pricingtable-wrapper box-hover style-1 ">
                        <div class="pricingtable-inner">
                            @if(isset($pricing_bx['pricing_tag']) && !empty($pricing_bx['pricing_tag']))
                            <div class="tagline">{{ $pricing_bx['pricing_tag'] }}</div>
                            @endif
                            <h4 class="pricingtable-title">
                                {{ isset($pricing_bx['pricing_title_icon']) ? $pricing_bx['pricing_title_icon'] : '' }}
                                {{ isset($pricing_bx['pricing_title']) ? $pricing_bx['pricing_title'] : '' }}
                            </h4>
                            <p>{{ isset($pricing_bx['pricing_description']) ? $pricing_bx['pricing_description'] : '' }}</p>
                            <div class="pricingtable-price">
                                <h2 class="pricingtable-bx text-primary"> <span>$</span>{{ isset($pricing_bx['item_price']) ? $pricing_bx['item_price'] : '' }}<small>/ {{ __('Per Month') }}</small></h2>
                                <div class="days-label bg-primary">{{ __('Try 7 Days for free') }}</div>
                                <h6>{{ isset($pricing_bx['feature_description']) ? $pricing_bx['feature_description'] : '' }}</h6>
                            </div>
                            <ul class="pricingtable-features">
                                @if(isset($pricing_bx['features']) && !empty($pricing_bx['features']))
                                    @php
                                        $features = explode(",", $pricing_bx['features']);
                                    @endphp
                                    @foreach($features as $feature)
                                    <li>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M23 12L20.56 9.21L20.9 5.52L17.29 4.7L15.4 1.5L12 2.96L8.6 1.5L6.71 4.69L3.1 5.5L3.44 9.2L1 12L3.44 14.79L3.1 18.49L6.71 19.31L8.6 22.5L12 21.03L15.4 22.49L17.29 19.3L20.9 18.48L20.56 14.79L23 12ZM9.38 16.01L7 13.61C6.61 13.22 6.61 12.59 7 12.2L7.07 12.13C7.46 11.74 8.1 11.74 8.49 12.13L10.1 13.75L15.25 8.59C15.64 8.2 16.28 8.2 16.67 8.59L16.74 8.66C17.13 9.05 17.13 9.68 16.74 10.07L10.82 16.01C10.41 16.4 9.78 16.4 9.38 16.01Z" fill="#9467FE"></path>
                                        </svg>
                                        <span>{{ $feature }}</span>
                                    </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="pricingtable-footer">
                            <a href="{{ isset($pricing_bx['pricing_btn_link']) ? $pricing_bx['pricing_btn_link'] : '' }}" class="btn">
                                {{ isset($pricing_bx['pricing_btn']) ? $pricing_bx['pricing_btn'] : ''  }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>