<section class="content-inner contact-form-wraper style-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5 col-lg-5 m-b30">
                <div class="info-box">
                    <div class="info">
                        <h2>{{ isset($args['title']) ? $args['title'] : '' }}</h2>
                        <p class="font-18">{{ isset($args['description']) ? $args['description'] : '' }}</p>
                    </div>
                    
                    <div class="widget widget_about">
                        <div class="widget widget_getintuch">
                            <ul>
                                @if (isset($args['phone_number1']) || isset($args['phone_number2']))
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <span>
                                        {{ isset($args['phone_number1']) ? $args['phone_number1'] : ''  }}
                                        {!! isset($args['phone_number2']) ? '<br>'.$args['phone_number2'] : ''  !!}
                                    </span> 
                                </li>
                                @endif
                                @if (isset($args['email1']) || isset($args['email2']))
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <span>
                                        {{ isset($args['email1']) ? $args['email1'] : ''  }}
                                        {!! isset($args['email2']) ? '<br>'.$args['email2'] : ''  !!}
                                    </span> 
                                </li>
                                @endif
                                @if (isset($args['address1']) ||isset($args['address2']))
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>
                                        {{ isset($args['address1']) ? $args['address1'] : ''  }}
                                        {!! isset($args['address2']) ? '<br>'.$args['address2'] : ''  !!}
                                    </span> 
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>


                    @if(isset($args['grouped']) && !empty($args['grouped']))
                    <div class="social-box dz-social-icon style-3">
                        <h6>{{ __('Our Socials') }}</h6>
                        <ul class="social-icon">
                            @php
                                $social_icons = array(
                                    'facebook'  => '<i class="fab fa-facebook-f"></i>',
                                    'instagram' => '<i class="fab fa-instagram"></i>',
                                    'whatsapp'  => '<i class="fab fa-whatsapp"></i>',
                                    'twitter'   => '<i class="fab fa-twitter"></i>',
                                    'youtube'   => '<i class="fab fa-youtube"></i>',
                                    'linkedin'  => '<i class="fab fa-linkedin-in"></i>',
                                    'reddit'    => '<i class="fab fa-reddit-alien"></i>',
                                    'pinterest' => '<i class="fab fa-pinterest"></i>',
                                    'google'    => '<i class="fab fa-google-plus-g"></i>'
                                );
                            @endphp
                            @foreach($args['grouped'] as $icon)
                            <li>
                                <a class="social-btn" href="{{ isset($icon['social_link']) ? $icon['social_link'] : 'javascript: void(0);' }}">{!! $social_icons[$icon['icon']] !!}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
                
            <div class="col-xl-7 col-lg-7">
                <div class="contact-box">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <h2 class="mb-0">{{ __('Get In touch') }}</h2>
                                <p class="mb-0 font-18 text-primary">{{ __('We are here for you. How we can help?') }}</p>
                            </div>
                            <form method="POST" action="{{ route('front.contact') }}">
                                @csrf
                                <div class="row">
                                    @if($errors->any())
                                        <div class="col-12 m-b30">
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ implode(', ', $errors->all(':message')) }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    @endif
                                    @if( Session::get('success') )
                                        <div class="col-12 m-b30">
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ Session::get('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-xl-6 mb-3 mb-md-4">
                                        <input name="first_name" required type="text" class="form-control" placeholder="{{ __('First Name') }}">
                                    </div>
                                    <div class="col-xl-6 mb-3 mb-md-4">
                                        <input name="last_name" type="text" class="form-control" placeholder="{{ __('Last Name') }}">
                                    </div>
                                    <div class="col-xl-6 mb-3 mb-md-4">
                                        <input name="email" required type="text" class="form-control" placeholder="{{ __('Email Address') }}">
                                    </div>
                                    <div class="col-xl-6 mb-3 mb-md-4">
                                        <input name="phone_number" required type="text" class="form-control" placeholder="{{ __('Phone No.') }}">
                                    </div>
                                    <div class="col-xl-12 mb-3 mb-md-4">
                                        <textarea name="message" required class="form-control" placeholder="{{ __('Message') }}"></textarea>
                                    </div>
                                    <div class="col-xl-12">
                                        <button name="submit" type="submit" value="{{ __('Submit') }}" class="btn btn-primary">{{ __('Submit Now') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
