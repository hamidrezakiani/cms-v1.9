@php
    $blogs = HelpDesk::elementPostsByArgs($args);
@endphp
<div class="section-full bg-white content-inner contact-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1 class="contact-title text-center">{{ isset($args['title']) ? $args['title'] : '' }}</h1>
                @if(isset($args['show_image']) && $args['show_image'] === 'true')
                    <div class="dlab-post-media m-b30">
                        <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image']) }}" alt="{{ __('Contact Image') }}"> 
                    </div>
                @endif
                <div class="max-w700 m-auto">
                    <p class="first-content">{!! isset($args['content']) ? $args['content'] : '' !!}</p>
                    <div class="dzFormMsg"></div>
                    <form method="post" action="{{ route('front.contact') }}">
                        @csrf
                        <div class="row m-lr0">
                            @if($errors->any())
                                <div class="col-12 m-b30">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ __('Something  wrong!') }}</strong> {{ __('You should check in fields below.') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            @endif
                            @if( Session::get('success') )
                                <div class="col-12 m-b30">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ Session::get('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-6 col-sm-6 p-lr0">
                                <div class="form-group">
                                    <input name="first_name" type="text" required class="form-control" placeholder="{{ __('First Name') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 p-lr0">
                                <div class="form-group">
                                    <input name="last_name" type="text" required class="form-control" placeholder="{{ __('Last Name') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 p-lr0">
                                <div class="form-group">
                                    <input name="phone_number" type="text" required class="form-control" placeholder="{{ __('Phone Number') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 p-lr0">
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" required placeholder="{{ __('Email') }}">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 p-lr0 m-b30">
                                <div class="form-group">
                                    <textarea name="message" rows="4" class="form-control" required placeholder="{{ __('Add Your Message') }}" spellcheck="false"></textarea>
                                    <button name="submit" type="submit" value="Submit" class="btn radius-no primary">{{ __('Send') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

