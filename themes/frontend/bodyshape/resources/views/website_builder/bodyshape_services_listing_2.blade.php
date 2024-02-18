<!-- TRAINING CLASSESS -->
<section class="clearfix pb-5">
    <div class="container">
        <div class="section-head text-center">
            <span class="sub-title wow fadeInUp" data-wow-delay="0.2s">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</span>
            <h2 class="title wow fadeInUp" data-wow-delay="0.4s">{{ isset($args['title']) ? $args['title'] : '' }} <span class="text-primary">{{ isset($args['title_sub_part']) ? $args['title_sub_part'] : '' }}</span></h2>
            <p class="wow fadeInUp" data-wow-delay="0.6s">{{ isset($args['description']) ? $args['description'] : '' }}</p>
        </div>
    </div>
    <div class="fitness-classes">
        @if (isset($args['services']) && !empty($args['services']))
        <div class="row g-0">
            @php
                $image_direction = 'right';
                $blogs = HelpDesk::getCptPostsBySlug($args['services']);
            @endphp
            @forelse($blogs as $key => $blog)
                @if ($image_direction == 'left')
                <div class="col-xl-3 col-md-6">
                    <div class="dz-media">
                        <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="">
                    </div>
                </div>
                @endif

                <div class="col-xl-3 col-md-6">
                    <div class="dz-info {{ ($key % 2 == 0) ? 'bg-secondary' : 'bg-primary' }}">
                        <div class="clearfix text-white">
                            @php
                                $blogMeta_subtitle = HelpDesk::getPostMeta($blog->id, 'subtitle');
                            @endphp
                            <span class="{{ ($key % 2 == 0) ? 'text-primary' : '' }} subtitle">{{ $blogMeta_subtitle }}</span>
                            <h4 class="title text-white">{{ $blog->title }}</h4>
                            <p>{{ $blog->content }}</p>
                            <a href="javascript: void(0);" class="btn {{ ($key % 2 == 0) ? 'btn-primary' : 'btn-secondary' }} btn-skew"><span>{{ __('Read More') }}</span></a>
                        </div>
                    </div>
                </div>

                @if ($image_direction == 'right')
                <div class="col-xl-3 col-md-6">
                    <div class="dz-media">
                        <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="">
                    </div>
                </div>
                @endif
                @php
                    if (($key+1) % 2 == 0 ) {
                        $image_direction = $image_direction == 'right' ? 'left' : 'right';
                    }
                @endphp
            @empty
            @endforelse
        </div>
        @endif
    </div>
</section>
<!-- TRAINING PROGRAMS -->