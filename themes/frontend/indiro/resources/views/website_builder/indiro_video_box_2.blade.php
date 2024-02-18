@php
    if (isset($args['video_box_image']) &&  Storage::exists('public/page-images/magic-editor/'.$args['video_box_image'])) {
        $image = asset('storage/page-images/magic-editor/'.$args['video_box_image']);
    }else{
        $image = asset('images/noimage.jpg');
    }
@endphp
<section class="content-inner-4 overlay-black-middle" style="background-image:url({{ $image }});background-size: cover;background-position: center;">
    <div class="container">
        <div class="section-head style-1 text-center">
            <h6 class="sub-title text-primary">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</h6>
            <h2 class="title m-b20 text-white">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
        </div>
        @if (isset($args['iframe']))
        <a href="{{ $args['iframe'] }}" class="popup-youtube play-btn2 m-auto"><i class="fa fa-play"></i></a>
        @endif
    </div>
</section>