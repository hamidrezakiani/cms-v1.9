<div class="position-relative">
    <div class="banner-top-info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-8">
                    <div class="location">
                        <p><i class="fa fa-map-marker"></i>{{ isset($args['location']) ? $args['location'] : '' }}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-4 align-self-center">
                    <ul class="social-link list-inline m-b0">
                        <li><a href="{{ isset($args['facebook_link']) ? $args['facebook_link'] : 'javascript:void(0);' }}" class="fa fa-facebook"></a></li>
                        <li><a href="{{ isset($args['instagram_link']) ? $args['instagram_link'] : 'javascript:void(0);' }}" class="fa fa-instagram"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider Banner -->
<div class="banner-slide owl-carousel owl-dots">
    @if (isset($args['grouped']) && !empty($args['grouped']))
        @foreach ($args['grouped'] as $slide)
            <div class="item">
                <div class="slider-bx">
                    <div class="dlab-post-media overlay-black-light">
                        <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$slide['slide_image']) }}" alt="{{ __('Image') }}">
                    </div>
                    <div class="slider-info text-white">
                        <h6>{{ isset($slide['subtitle']) ? $slide['subtitle'] : '' }}</h6>
                        <h2>{{ isset($slide['title']) ? $slide['title'] : '' }}</h2>
                    </div>
                </div>
            </div>  
        @endforeach
    @endif
</div>
<!-- header -->
@if (isset($args['header']) && !empty($args['header']))
<header class="site-header mo-left header-full header header-transparent header-bottom">
    <!-- Main Header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix ">
            <div class="container-fluid">
                <div class="header-content-bx">
                    <!-- website logo -->
                    <div class="logo-header">
                        <a href="{{ url('/') }}"><img src="{{ DzHelper::siteLogoLight() }}" alt="{{ __('Site Logo') }}"/></a>
                    </div>
                    <!-- Extra Nav -->
                    <div class="extra-nav">
                        <div class="extra-cell">
                            <ul>
                                <li class="search-btn">
                                    <a href="javascript:void(0);" class="btn-link menu-icon">
                                        <div class="menu-icon-in">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Main Nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-center" id="navbarNavDropdown">
                        {{ DzHelper::nav_menu(
                            array(
                                'theme_location'  => 'primary',
                                'menu_class'      => 'nav navbar-nav',
                            )
                          ); }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Header END -->
    <!-- Header Left -->
    <div class="header-nav navbar-collapse collapse full-sidenav content-scroll">
        <div class="location">
            <p><i class="fa fa-map-marker"></i>{{ isset($args['location']) ? $args['location'] : '' }}</p>
        </div>
        {{ DzHelper::nav_menu(
            array(
                'theme_location'  => 'expanded',
                'menu_class'      => 'nav navbar-nav',
            )
          ); }}
        <div class="logo-header">
            <a href="{{ url('/') }}"><img src="{{ DzHelper::siteLogoLight() }}" alt="{{ __('Site Logo') }}"/></a>
        </div>
    </div>
    <div class="menu-close">
        <i class="la la-close"></i>
    </div>
    <!-- Header Left End -->
</header>
@endif
<!-- header END -->
@push('inline-scripts')
<script>
	'use-strict';
	jQuery(document).ready(function(){
        if(jQuery('header').length > 1){
            jQuery('header:first').remove();
        }
	})
</script>	
@endpush
