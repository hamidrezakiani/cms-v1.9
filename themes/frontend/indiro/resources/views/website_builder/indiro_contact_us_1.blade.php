@php
    $blogs = HelpDesk::elementPostsByArgs($args);
@endphp

<section class="content-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 m-b30">
                <div class="section-head style-1 aos-item" data-aos="fade-right" data-aos-duration="800" data-aos-delay="400">
                    @if(isset($args['subtitle']))
                        <h5 class="sub-title text-primary">{{ $args['subtitle'] }}</h5>
                    @endif
                    <h2 class="title m-b20">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
                    <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
                </div>
                <div class="icon-bx-wraper left style-2 m-b10 aos-item" data-aos="fade-right" data-aos-duration="800" data-aos-delay="200">
                    <div class="icon-bx-sm radius bg-primary"> 
                        <a href="javascript:void(0);" class="icon-cell text-white">
                            <i class="far fa-envelope"></i>
                        </a> 
                    </div>
                    <div class="row align-items-center w-100">
                        <div class="col-sm-6">
                            <h4 class="dz-title mb-sm-0 mb-2">{{ __('EMAIL ADDRESS') }}</h4>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="m-b0">{{ isset($args['email1']) ? $args['email1'] : '' }}<br>{{ isset($args['email2']) ? $args['email2'] : '' }}</h5>
                        </div>
                    </div>
                </div>
                <div class="icon-bx-wraper left style-2 m-b10 aos-item" data-aos="fade-right" data-aos-duration="800" data-aos-delay="400">
                    <div class="icon-bx-sm radius bg-primary"> 
                        <a href="javascript:void(0);" class="icon-cell text-white">
                            <i class="fas fa-phone"></i>
                        </a> 
                    </div>
                    <div class="row align-items-center w-100">
                        <div class="col-sm-6">
                            <h4 class="dz-title mb-sm-0 mb-2">{{ __('PHONE NUMBER') }}</h4>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="m-b0 text-nowrap">{{ isset($args['phone_number1']) ? $args['phone_number1'] : '' }}<br>{{ isset($args['phone_number2']) ? $args['phone_number2'] : '' }}</h5>
                        </div>
                    </div>
                </div>
                <div class="icon-bx-wraper left style-2 m-b10 aos-item" data-aos="fade-right" data-aos-duration="800" data-aos-delay="600">
                    <div class="icon-bx-sm radius bg-primary"> 
                        <a href="javascript:void(0);" class="icon-cell text-white">
                            <i class="fas fa-map-marker-alt"></i>
                        </a> 
                    </div>
                    <div class="row align-items-center w-100">
                        <div class="col-sm-6">
                            <h4 class="dz-title mb-sm-0 mb-2">{{ __('OFFICE ADDRESS') }}</h4>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="m-b0">{{ isset($args['address']) ? $args['address'] : '' }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 m-b30 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
                <div class="map-iframe">
                    <iframe src="{{ isset($args['iframe']) ? $args['iframe'] : '' }}" class="align-self-stretch radius-sm" style="border:0; width:100%; min-height:100%;" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>