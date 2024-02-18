<!-- Contact Us Page -->
<section class="content-inner-2 pt-0">
    <div class="map-iframe">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d227748.3825624477!2d75.65046970649679!3d26.88544791796718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396c4adf4c57e281%3A0xce1c63a0cf22e09!2sJaipur%2C+Rajasthan!5e0!3m2!1sen!2sin!4v1500819483219" style="border:0; width:100%; min-height:100%; margin-bottom: -8px;" allowfullscreen></iframe>
    </div>
</section>
@php
    if (isset($args['image']) &&  Storage::exists('public/page-images/magic-editor/'.$args['image'])) {
        $image = asset('storage/page-images/magic-editor/'.$args['image']);
    }else{
        $image = asset('images/noimage.jpg');
    }
@endphp
<section class="contact-wraper1" style="background-image: url({{ $image }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contact-info">
                    <div class="section-head text-white style-1">
                        <h3 class="title text-white">{{ isset($args['title']) ? $args['title'] : '' }}</h3>
                        <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
                    </div>
                    <ul class="no-margin">
                        @if (isset($args['address']))
                        <li class="icon-bx-wraper text-white left m-b30">
                            <div class="icon-md">
                                <span class="icon-cell">
                                    <i class="flaticon-placeholder-1"></i>
                                </span>
                            </div>
                            <div class="icon-content">
                                <h4 class=" dz-tilte text-white">{{ __('Our Address') }}</h4>
                                <p class="font-18">{{ $args['address'] }}</p>
                            </div>
                        </li>
                        @endif
                        @if (isset($args['email']))
                        <li class="icon-bx-wraper text-white left m-b30">
                            <div class="icon-md">
                                <span class="icon-cell">
                                    <i class="flaticon-message"></i>
                                </span>
                            </div>
                            <div class="icon-content">
                                <h4 class="dz-tilte text-white">{{ __('Our Email') }}</h4>
                                <p class="font-18">{{ $args['email'] }}</p>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 m-b40">
                <div class="contact-area1 m-r20 m-md-r0">
                    <div class="section-head style-1">
                        @if (isset($args['form_subtitle']))<h6 class="sub-title text-primary">{{ $args['form_subtitle'] }}</h6>@endif
                        <h3 class="title m-b20">{{ isset($args['form_title']) ? $args['form_title'] : '' }}</h3>
                    </div>
                    <form class="dz-form" method="POST" action="{{ route('front.contact') }}">
                        @csrf
                        <input type="hidden" class="form-control" name="dzToDo" value="Contact">
                        @if($errors->any())
                            <div class="m-b30">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ implode(', ', $errors->all(':message')) }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                        @if( Session::get('success') )
                            <div class="m-b30">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ Session::get('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                        <div class="input-group">
                            <input name="first_name" required type="text" class="form-control" placeholder="{{ __('First Name') }}">
                        </div>
                        <div class="input-group">
                            <input name="last_name" type="text" class="form-control" placeholder="{{ __('Last Name') }}">
                        </div>
                        <div class="input-group">
                            <input name="email" required type="text" class="form-control" placeholder="{{ __('Email Address') }}">
                        </div>
                        <div class="input-group">
                             <input name="phone_number" required type="text" class="form-control" placeholder="{{ __('Phone No.') }}">
                        </div>
                        <div class="input-group">
                            <textarea rows="4" name="message" required class="form-control" placeholder="{{ __('Message') }}"></textarea>
                        </div>
                        <div>
                            <button name="submit" type="submit" value="submit" class="btn w-100 btn-primary btn-border">{{ __('CONTACT US') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Us Page End -->