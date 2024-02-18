@php
    $box = 1;
@endphp
@forelse ($blogs as $blog)
    @php
        $box = ($box > 3) ? 1 : $box;
    @endphp
    @if ($box == 2)
        <div class="col-xl-5 col-lg-12 float-end m-b30">
            <div class="dz-card style-2" style="background-image: url({{ DzHelper::getStorageImage('storage/blog-images/'.$blog->feature_img->value) }});background-position: center;">
                <div class="dz-category">
                    <ul class="dz-badge-list">
                        <li>
                            <a href="javascript:void(0);" class="dz-badge">{{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}</a>
                        </li>
                    </ul>
                </div>
                <div class="dz-info">
                    <h2 class="dz-title"><a href="{{ DzHelper::laraBlogLink($blog->id) }}" class="text-white">{{ Str::limit($blog->title, 30, ' ...') }}</a></h2>
                    <div class="dz-meta">
                        <ul>
                            <li class="post-author">
                                <a href="{{ DzHelper::author($blog->user_id) }}">
                                    <span>{{ __('By') }} {{ optional($blog->user)->name }}</span>
                                </a>
                            </li>
                            <li class="post-date"><a href="javascript:void(0);"> {{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-xl-7 col-lg-12 {{ $box == 1 ? 'float-start' : '' }}">
            <div class="dz-card style-1 blog-half m-b30">
                <div class="dz-media">
                    <a href="{{ DzHelper::laraBlogLink($blog->id) }}">
                        <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                    </a>
                    <ul class="dz-badge-list">
                        <li><a href="javascript:void(0);" class="dz-badge">{{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}</a></li>
                    </ul>
                    <a href="{{ DzHelper::laraBlogLink($blog->id) }}" class="btn btn-secondary">{{ __('Read More') }}</a>
                </div>
                <div class="dz-info">
                    <div class="dz-meta">
                        <ul>
                            <li class="post-author">
                                <a href="{{ DzHelper::author($blog->user_id) }}">
                                    <span>{{ __('By') }} {{ optional($blog->user)->name }}</span>
                                </a>
                            </li>
                            <li class="post-date"><a href="javascript:void(0);"> {{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}</a></li>
                        </ul>
                    </div>
                    <h4 class="dz-title"><a href="{{ DzHelper::laraBlogLink($blog->id) }}">{{ Str::limit($blog->title, 35, ' ...') }}</a></h4>
                    <p class="m-b0">{{ Str::limit($blog->excerpt, 60, ' ...') }}</p>
                </div>
            </div>
        </div>
    @endif
    @php
        $box++;
    @endphp
@empty
@endforelse