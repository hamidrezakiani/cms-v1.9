<!-- Crypto Coins Start -->
<div class="{{ isset($args['under_section']) && $args['under_section'] == 'true' ? '' : 'content-inner' }} clearfix bg-primary-light">
    <div class="container">
        <div class="{{ isset($args['under_section']) && $args['under_section'] == 'true' ? 'currancy-wrapper' : '' }}">
            @if(isset($args['grouped']) && !empty($args['grouped']))
            <div class="row justify-content-center">
                @foreach($args['grouped'] as $icon_bx)
                <div class="col-lg-4 col-md-6 m-b30 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="icon-bx-wraper style-1 box-hover">
                        <div class="icon-media">
                            <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$icon_bx['icon']) }}" alt="{{ __('icon') }}">
                            <div class="icon-info">
                                <h5 class="title">{{ isset($icon_bx['title']) ? $icon_bx['title'] : '' }}</h5>
                                <span>{{ isset($icon_bx['description']) ? $icon_bx['description'] : '' }}</span>
                            </div>
                        </div>
                        <div class="icon-content">
                            <ul class="price">
                                <li>
                                    <h6 class="mb-0 amount">{{ isset($icon_bx['price']) ? $icon_bx['price'] : '' }}</h6>
                                    <span class="text-red percentage">{{ isset($icon_bx['ratio']) ? $icon_bx['ratio'] : '' }}</span>
                                </li>
                                <li>
                                    <span>{{ isset($icon_bx['price_title']) ? $icon_bx['price_title'] : '' }}</span>
                                    <span>{{ isset($icon_bx['ratio_title']) ? $icon_bx['ratio_title'] : '' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
<!-- Crypto Coins End -->
