<div class="widget style-1 recent-posts-entry">
    <div class="widget-title">
        <h4 class="title">Recent Post</h4>
    </div>
    <div class="widget-post-bx">
        @forelse($blogs as $blog)
        <div class="widget-post clearfix">
            <div class="dz-media"> 
                <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
            </div>
            <div class="dz-info">
                <div class="dz-meta">
                    <ul>
                        <li class="post-date"> {{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}</li>
                    </ul>
                </div>
                <h6 class="title"><a href="{{ DzHelper::laraBlogLink($blog->id) }}">{{ Str::limit($blog->title, 30, ' ...') }}</a></h6>
            </div>
        </div>
        @empty
        <div class="col-md-12">{{ __('No record found.') }}</div>
        @endforelse
    </div>
</div>