<div class="dlab-bnr-inr overlay-black-middle bg-pt " style="background-image:url({{ isset($args['image']) && Storage::exists('public/page-images/magic-editor/'.$args['image']) ? asset('storage/page-images/magic-editor/'.$args['image']) : theme_asset('images/background/body-bg/bg2.jpg') }})">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
            <h2 class="text-white">
                {{ isset($args['title']) ? $args['title'] : '' }}
            </h2>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li>
                        <a href="{{ url('/') }}"><i class="ti-home"></i>{{ __('Home') }}</a>
                    </li>
                    <li>{{ isset($args['title']) ? $args['title'] : '' }}</li>
                </ul>
            </div>
            <!-- Breadcrumb row END -->
        </div>
    </div>
</div>