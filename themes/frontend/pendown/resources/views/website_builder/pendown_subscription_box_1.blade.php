<div class="section-full">
	<div class="container">
		<form method="post" class="dzSubscribe subscribe-box row align-items-center">
			<div class="col-lg-12">
				<div class="dzSubscribeMsg"></div>
			</div>
			<div class="col-lg-3 col-md-12">
				<div class="sub-title">
					<h3 class="title">{{ isset($args['title']) ? $args['title'] : '' }}</h3>
					<p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-4">
				<div class="input-group">
					<input name="dzName" required="required" type="text" class="form-control" placeholder="{{ __('Your Name') }} ">
				</div>
			</div>
			<div class="col-lg-3 col-md-4">
				<div class="input-group">
					<input name="dzEmail" required="required" type="email" class="form-control" placeholder="{{ __('Your Email Address') }}">
				</div>
			</div>
			<div class="col-lg-3 col-md-4">
				<div class="input-group">
					<button name="submit" value="{{ __('Submit') }}" type="submit" class="btn white">{{ __('Subscribe') }}</button>
				</div>
			</div>
		</form>
	</div>
</div>