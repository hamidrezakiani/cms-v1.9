<section class="dz-section-3 bg-primary">
    @php
        if (isset($args['video_box_image']) &&  Storage::exists('public/page-images/magic-editor/'.$args['video_box_image'])) {
            $image = asset('storage/page-images/magic-editor/'.$args['video_box_image']);
        }else{
            $image = asset('images/noimage.jpg');
        }
    @endphp
    <div class="bg-img bgeffect" data-0="background-position:0px 500px;" data-end="background-position:0px 1000px;" style="background-image:url({{ $image }});background-size:cover;"></div>
    <div class="container">
        <div class="text-center">
            @if (isset($args['iframe']))
            <a href="{{ $args['iframe'] }}" class="popup-youtube play-btn1 text-white mx-auto m-b20"><i class="fa fa-play"></i></a>
            @endif
            <h4 class="text-white">{{ isset($args['title']) ? $args['title'] : '' }}</h4>
        </div>
    </div>
</section>