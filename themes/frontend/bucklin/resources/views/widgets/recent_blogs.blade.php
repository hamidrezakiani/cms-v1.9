<div class="widget recent-posts-entry">
    <h5 class="widget-title">{{ __('Recent Posts') }}</h5>
    <div class="widget-post-bx">
        @forelse($blogs as $blog)
            <div class="widget-post clearfix">
                <div class="dlab-post-media">
                    <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}" width="200" height="143">
                </div>
                <div class="dlab-post-info">
                    <div class="dlab-post-header">
                        @php
                            if($blog->visibility != 'Pu'){
                                $blog_visibility = $blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ');
                            }else {
                                $blog_visibility = '';
                            }

                        @endphp
                        <h6 class="post-title"><a href="{!! DzHelper::laraBlogLink($blog->id) !!}">{{ $blog_visibility }}{{ Str::limit($blog->title, 30, '...') }}</a></h6>
                        <div class="post-date">
                            {{ $blog->publish_on }}
                        </div>
                    </div>
                </div>
            </div>
        @empty
        <div class="col-md-12">{{ __('No record found.') }}</div>
        @endforelse
    </div>
</div>