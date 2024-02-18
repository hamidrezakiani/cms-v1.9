<div class="dlab-bnr-inr overlay-black-middle bg-pt " style="background-image:url({{ theme_asset('images/background/body-bg/bg2.jpg') }})">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
            <h2 class="text-white">
                {{ $title }}
            </h2>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li>
                        <a href="{{ url('/') }}"><i class="ti-home"></i>{{ __('Home') }}</a>
                    </li>
                    <li>{{ $title }}</li>
                </ul>
            </div>
            <!-- Breadcrumb row END -->
        </div>
    </div>
</div>