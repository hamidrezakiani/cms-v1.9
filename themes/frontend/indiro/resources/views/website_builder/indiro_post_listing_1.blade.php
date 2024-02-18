<section>
    <div class="container">
        <div class="blog-wrapper bg-secondary">
            <div class="section-head style-1 text-center">
                <h5 class="text-white sub-title">{{ isset($args['subtitle']) ? $args['subtitle'] : '' }}</h5>
                <h2 class="title m-b10 text-white">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
                <p class="text-white">{{ isset($args['description']) ? $args['description'] : '' }}</p>
            </div>
            <div class="row">
                @php
                    $blogs = HelpDesk::elementPostsByArgs($args);
                @endphp
                @forelse($blogs as $blog)
                <div class="col-lg-4 m-b30 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <div class="dz-card style-1 text-white overlay-shine">
                        <div class="dz-media">
                            <a href="{{ DzHelper::laraBlogLink($blog->id) }}">
                                <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                            </a>
                        </div>
                        <div class="dz-info">
                            <div class="dz-meta">
                                <ul>
                                    <li class="post-date"><span>{{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}</span></li>
                                    <li class="post-date"><a href="{{ DzHelper::author($blog->user->id) }}">{{ __('By') }} {{ optional($blog->user)->name }}</a></li>
                                </ul>
                            </div>
                            <h4 class="dz-title"><a href="{{ DzHelper::laraBlogLink($blog->id) }}">{{ Str::limit($blog->title, 45, ' ...') }}</a></h4>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
            <div class="text-center">
                @if (isset($args['view_all']))
                    <a href="{{ isset($args['page_id']) ? DzHelper::laraPageLink($args['page_id']) : 'javascript:void(0);' }}" class="btn btn-primary btn-icon">{{ __('VIEW MORE') }} <i class="fas fa-arrow-right"></i></a>
                @endif
            </div>
        </div>
    </div>
</section>