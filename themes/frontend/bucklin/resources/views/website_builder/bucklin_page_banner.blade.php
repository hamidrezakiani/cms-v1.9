<div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-middle bg-pt" style="background-image:url({{ isset($args['image']) && Storage::exists('public/page-images/magic-editor/'.$args['image']) ? asset('storage/page-images/magic-editor/'.$args['image']) : theme_asset('images/banner/bnr1.jpg') }});">
    <div class="container">
        <div class="dlab-bnr-inr-entry">
            <h1 class="text-white">{{ isset($args['title']) ? $args['title'] : '' }}</h1>
        </div>
    </div>
</div>