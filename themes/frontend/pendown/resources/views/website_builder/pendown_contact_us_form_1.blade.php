<div class="section-full bg-white content-inner contact-form">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				<div class="blog-post blog-single mb-0">
                    @if(isset($args['show_image']) && $args['show_image'] === 'true')
                        <div class="dlab-media m-b50 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                            <img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image']) }}" alt="{{ __('Contact Image') }}">
                        </div>
                    @endif
					<div class="dlab-info">
						<div class="dlab-post-text text">
							<h1 class="font-weight-600">{{ isset($args['title']) ? $args['title'] : '' }}</h1>
							<p class="first-content">{{ isset($args['description']) ? $args['description'] : '' }}</p>
						</div>
					</div>
				</div>
				<form class="dz-form" method="POST" action="{{ route('front.contact') }}">
                    @csrf
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
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input name="first_name" type="text" required class="form-control" placeholder="{{ __('First Name') }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input name="last_name" type="text"  class="form-control" placeholder="{{ __('Last Name') }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" required="" placeholder="{{ __('Email Address') }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input name="phone_number" required type="text" class="form-control" placeholder="{{ __('Phone No.') }}">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea rows="4" name="message" required class="form-control" placeholder="{{ __('Message') }}"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <button name="submit" type="submit" value="Submit" class="btn radius-no primary">{{ __('Send Message') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>