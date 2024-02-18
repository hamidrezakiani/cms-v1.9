@if(isset($args['grouped']) && !empty($args['grouped']))
<div class="section-full social-link-bx">
    <div class="container">
        <div class="row justify-content-center">
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
            <div class="col-lg-2 col-md-4 col-sm-4 col-6">
                <a href="{{ isset($icon['social_link']) ? $icon['social_link'] : 'javascript:void(0);'  }}" class="social-link">
                    <i class="{{ $social_icons[$icon['icon']] }}"></i>
                    <span>{{ $icon['icon'] }}</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif