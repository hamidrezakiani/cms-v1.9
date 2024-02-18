@php
    $blogs = HelpDesk::elementPostsByArgs($args);
@endphp
<!-- About Us -->
<div class="section-full bg-white content-inner-2 about-us">
    <div class="min-container">
        @if (isset($args['title']) || isset($args['content1']))
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
                <p class="first-content">{{ isset($args['content1']) ? $args['content1'] : '' }}</p>
            </div>
        </div>
        @endif
    </div>
    <div class="container">
        <div class="about-me-thumb">
            <img class="thumb1" src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image1']) }}" alt="{{ __('Image') }}">
            <img class="thumb2" src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image2']) }}" alt="{{ __('Image') }}">
        </div>
    </div>
    <div class="min-container">
        <div class="row">
            <div class="col-lg-12">
                @if (isset($args['content1']))
                <p class="first-content">{{ isset($args['content1']) ? $args['content1'] : '' }}</p>
                @endif
                <div class="text-center p-t20">
                    @if(isset($args['grouped']) && !empty($args['grouped']))
                    <ul class="list-inline m-b0">
                        @php
                            $social_icons = array(
                                'facebook'  => 'fa fa-facebook-f',
                                'instagram' => 'fa fa-instagram',
                                'whatsapp'  => 'fa fa-whatsapp',
                                'twitter'   => 'fa fa-twitter',
                                'youtube'   => 'fa fa-youtube',
                                'linkedin'  => 'fa fa-linkedin-in',
                                'reddit'    => 'fa fa-reddit-alien',
                                'pinterest' => 'fa fa-pinterest',
                                'google'    => 'fa fa-google-plus-g'
                            );
                        @endphp
                        @foreach($args['grouped'] as $icon)
                        <li><a href="{{ isset($icon['social_link']) ? $icon['social_link'] : 'javascript:void(0);'  }}" class="btn-link text-primary m-r10 font-16"><i class="{{ $social_icons[$icon['icon']] }}"></i></a></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us End -->