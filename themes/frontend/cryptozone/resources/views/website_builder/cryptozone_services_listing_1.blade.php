<section class="content-inner bg-light icon-section section-wrapper2">
    <div class="container">
        <div class="section-head text-center">
            <h6 class="sub-title text-primary">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</h6>
            <h2 class="title">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
            <p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
        </div>
        @if (isset($args['services']) && !empty($args['services']))
        <div class="row sp60">
            @php
                $blogs = HelpDesk::getCptPostsBySlug($args['services']);
            @endphp
            @forelse($blogs as $blog)
            <div class="col-xl-4 col-md-6 m-b60 wow fadeInUp" data-wow-delay="0.2s">
                <div class="icon-bx-wraper style-3 text-center">
                    <div class="icon-media">
                        <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Image') }}">
                    </div>
                    <div class="icon-content">
                        <h4 class="title">{{ $blog->title }}</h4>
                        <p class="m-b0">{{ $blog->content }}</p>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
        @endif
    </div>
    <img class="bg-shape1" src="{{ theme_asset('images/home-banner/shape1.png') }}" alt="">
</section>
