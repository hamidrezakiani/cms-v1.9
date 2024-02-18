@php
    $blogs = HelpDesk::elementPostsByArgs($args);
@endphp
<div class="section-full bg-white content-inner">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				<div class="section-head text-center">
					<span>{{ isset($args['title']) ? $args['title'] : '' }}</span>
				</div>
				<div class="row blog-box">
					@forelse($blogs as $blog)
					<div class="col-md-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
						<div class="dlab-card blog-grid">
							<div class="dlab-media">
								<img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
							</div>
							<div class="dlab-info">
								<div class="dlab-meta">
									<ul>
										<li class="post-category d-block">
											@forelse($blog->blog_categories as $category)
											<a href="javascript:void(0);">{{ $category->title }}</a>
											@empty
            							@endforelse
										</li>
										<li class="post-date">{{ __('at') }} <span>{{ $blog->publish_on }}</span></li>
									</ul>
								</div>
								<h4 class="dlab-title"><a href="{{ DzHelper::laraBlogLink($blog->id) }}">{{ isset($blog->title) ? Str::limit($blog->title, 20, ' ...') : '' }}</a></h4>
								<div class="dlab-feed">
									<ul>
										{{-- commented because not working --}}
										<li class="post-dislike"><a href="javascript:void(0);"><i class="ti-comment-alt"></i><span>{{ $blog->blog_comments_count }}</span></a></li>
										<li class="post-share"><i class="ti-share"></i><span>{{ __('Share') }}</span>
											<ul>
												<li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
												<li><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
												<li><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
												<li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					@empty
            		@endforelse
				</div>

				@if (isset($args['pagination']) && $args['pagination'] == true)
					{!! $blogs->links('elements.pagination') !!}
				@elseif(isset($args['view_all']) && $args['view_all'] == true)
					<div class="reload-btn text-center">
						<a href="{{ isset($args['page_id']) ? DzHelper::laraPageLink($args['page_id']) : 'javascript:void(0);' }}" class="btn outline black radius-xl"><span>{{ isset($args['btn_text']) ? $args['btn_text'] : 'View All' }}</span></a>
					</div>
				@endif
			</div>
		</div>
	</div>
</div>