@forelse($blogs as $blog)
<div class="col-lg-6 m-b30">
    <div class="blog-card blog-grid bg-dark">
        <div class="blog-card-media">
            <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
        </div>
        <div class="blog-card-info text-center">
            <h2 class="title"><a href="{{ DzHelper::laraBlogLink($blog->id) }}">{{ Str::limit($blog->title, 20, ' ...') }}</a></h2>
            <div class="post-date">
                {{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}
            </div>
            <ul class="add-info">
                <li><a href="{{ DzHelper::laraBlogLink($blog->id) }}" class="btn outline radius-no white">{{ __('Read More') }}</a></li>
            </ul>
        </div>
    </div>
</div>
@empty
@endforelse