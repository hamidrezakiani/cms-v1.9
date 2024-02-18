<div class="header-author">
	<div class="author-bx">
		<div class="author-media">
			<img src="{{ DzHelper::getStorageImage('storage/page-images/magic-editor/'.@$args['image']) }}" alt=""/>
		</div>
		<div class="author-info">
			<h2 class="title">{{ isset($args['title']) ? $args['title'] : '' }}</h2>
			<p>{{ isset($args['description']) ? $args['description'] : '' }}</p>
			<ul class="author-social">
				@php
                    $social_icons = array(
                        'facebook'  => '<i class="fa fa-facebook-f"></i>',
                        'instagram' => '<i class="fa fa-instagram"></i>',
                        'whatsapp'  => '<i class="fa fa-whatsapp"></i>',
                        'twitter'   => '<i class="fa fa-twitter"></i>',
                        'youtube'   => '<i class="fa fa-youtube"></i>',
                        'linkedin'  => '<i class="fa fa-linkedin-in"></i>',
                        'reddit'    => '<i class="fa fa-reddit-alien"></i>',
                        'pinterest' => '<i class="fa fa-pinterest"></i>',
                        'google'    => '<i class="fa fa-google-plus-g"></i>'
                    );
                @endphp
                @forelse($args['grouped'] as $icon)
				<li><a href="{{ isset($icon['social_link']) ? $icon['social_link'] : '#' }}">{!! $social_icons[$icon['icon']] !!} <span>{{ isset($icon['icon']) ? $icon['icon'] : '' }}</span></a></li>
				@empty
				@endforelse
			</ul>
		</div>
	</div>
</div>