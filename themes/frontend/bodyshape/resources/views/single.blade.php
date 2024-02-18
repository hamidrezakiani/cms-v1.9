@extends('layout.default')

@php
    $title = __('Blog Details');
    $requiredFieldIndicator = config('Discussion.name_email_require') ? DzHelper::requiredFieldIndicator() : '';
    $isRequired = config('Discussion.name_email_require') ? 'required' : '';
    $comment_author = !empty($_COOKIE['comment_author_'.config('constants.comment_cookie_hash')]) ? $_COOKIE['comment_author_'.config('constants.comment_cookie_hash')] : '';
    $comment_email = !empty($_COOKIE['comment_email_'.config('constants.comment_cookie_hash')]) ? $_COOKIE['comment_email_'.config('constants.comment_cookie_hash')] : '';
    $comment_url = !empty($_COOKIE['comment_website_'.config('constants.comment_cookie_hash')]) ? $_COOKIE['comment_website_'.config('constants.comment_cookie_hash')] : '';
@endphp

@section('content')

    @include('elements.banner-inner', compact('title'))

    <!-- Blog Detail -->
    <div class="section-full content-inner bg-white">
        <div class="container">
            <div class="row">
            @if($blog)
                <div class="{{ DzHelper::dzHasSidebar() ? 'col-lg-8 col-md-7' : 'col-12' }}">
                    @if ($blog->visibility == 'PP' && $status == 'locked')
                        <form method="POST" action="" class="my-5 py-5">
                            @csrf
                            <h6 class="text-primary mb-3">{{ __('This content is password protected. To view it please enter your password below:') }}</h6>
            
                            <div class=" row">
                                <div class="col-md-8 d-flex">
                                    <div class="input-area col-sm-8">
                                        <label for="password" class="form-control-label">{{ __('Password') }}</label>
                                        <div class=" input-line">
                                            <input id="password" type="password" class="form-control" required name="password">
                                        </div>
                                    </div>
            
                                    <div class="col-4 text-end d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary btn-skew align-self-end">
                                            <span>{{ __('Login') }}</span>
                                        </button>
                                    </div>
                                </div>
                                @error('password')
                                    <p class="text-danger mt-2">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </form>
                    @endif
                    @if ($status == 'unlock_'.$blog->id)
                    <div class="blog-single dz-card sidebar">
                        <div class="dz-media">
                            @php
                                $imagepath = isset($blog->page_metas) ? 'page-images' : 'blog-images';
                            @endphp
                            <img src="{{ DzHelper::getStorageImage('storage/'.$imagepath.'/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                        </div>
                        <div class="dz-info m-b30">
                            <div class="dz-meta">
                                <ul>
                                    <li class="post-author">
                                        <a href="{!! DzHelper::author($blog->user_id) !!}">
                                            <span>{{ __('By') }} {{ optional($blog->user)->name }}</span>
                                        </a>
                                    </li>
                                    <li class="post-date">{{ $blog->publish_on }}</li>
                                </ul>
                            </div>
                            @php
                                if($blog->visibility != 'Pu'){
                                    $blog_visibility = $blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ');
                                }else {
                                    $blog_visibility = '';
                                }
                            @endphp
                            <h3 class="dz-title">{{ $blog_visibility }}{{ $blog->title }}</h3>
                            <p class="blog-excerpt fs-5">{{ optional($blog)->excerpt }}</p>

                            {!! $blog->content !!}

                            @if(optional($blog->video)->value)
                                <div>
                                    <iframe width="420" height="345" src="{{ $blog->video->value }}"></iframe>
                                </div>
                            @endif

                            @if (optional($blog->child_pages)->isNotEmpty())
                                <h4>{{ __('Related Pages') }}</h4>
                                <ul class="related-pages p-l m-b30">
                                    @forelse($blog->child_pages as $child_page)
                                    <li>
                                        -<a href="{!! DzHelper::laraPageLink($child_page->id) !!}" class="pl-2 ">{{ $child_page->title }}</a>
                                        @if ($child_page->child_pages->isNotEmpty())
                                            {!! DzHelper::getChildPage($child_page->child_pages) !!}
                                        @endif
                                    </li>
                                    @empty
                                    @endforelse
                                </ul>
                            @endif
                            <div class="dz-share-post">
                                <div class="post-tags">
                                <h6 class="m-b0 m-r10 d-inline">{{ __('Tags:') }}</h6>
                                    @forelse($blog->blog_tags as $blog_tag)
                                    <a href="{!! DzHelper::laraBlogTagLink($blog_tag->id); !!}"><span>{{ $blog_tag->title }}</span></a>
                                    @empty
                                    {{ __('No record found.') }}
                                    @endforelse
                                </div>
                                <div class="dz-social-icon dark">
                                    <ul>
                                        <li><a target="_blank" class="fab fa-facebook-f" href="{{ config('Social.facebook') }}"></a></li>
                                        <li><a target="_blank" class="fab fa-twitter" href="{{ config('Social.twitter') }}"></a></li>
                                        <li><a target="_blank" class="fab fa-linkedin" href="{{ config('Social.linkedin') }}"></a></li>
                                        <li><a target="_blank" class="fab fa-instagram" href="{{ config('Social.instagram') }}"></a></li>
                                    </ul>
                                </div>                                  
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(isset($blogs) && !empty($blogs))
                    <div class="widget-title">
                        <h4 class="title">{{ __('Related Blog') }}</h4>
                    </div>
                    <div class="row m-b30 m-sm-b10">
                        @forelse($blogs as $related_blog)
                            <div class="col-lg-6 m-b30">
                                <div class="dz-card style-1 overlay-shine">
                                    <div class="dz-media ">
                                        <a href="{!! DzHelper::laraBlogLink($related_blog->id) !!}">
                                            <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$related_blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                        </a>
                                    </div>
                                    <div class="dz-info">
                                        <div class="dz-meta">
                                            <ul>
                                                <li class="post-author">
                                                    <a href="{!! DzHelper::author($related_blog->user_id) !!}">
                                                        <span>{{ __('By') }} {{ $related_blog->user->name }}</span>
                                                    </a>
                                                </li>
                                                <li class="post-date"><a href="javascript:void(0);">{{ Carbon\Carbon::parse($related_blog->publish_on)->format(config('Site.custom_date_format')) }}</a></li>
                                            </ul>
                                        </div>
                                        @php
                                            if($related_blog->visibility != 'Pu'){
                                                $related_blog_visibility = $related_blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ') ;
                                            }else {
                                                $related_blog_visibility = '';
                                            }
                                        @endphp
                                        <h4 class="title"><a href="{!! DzHelper::laraBlogLink($related_blog->id) !!}">{{ $related_blog_visibility }}{{ Str::limit($related_blog->title, 25, ' ...') }}</a></h4>
                                        <p>{{ Str::limit($related_blog->excerpt, 60, ' ...') }}</p>
                                        <a href="{!! DzHelper::laraBlogLink($related_blog->id) !!}" class="btn btn-primary btn-skew"><span>{{ __('Read More') }}</span></a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">{{ __('No Related Blogs found.') }}</div>
                        @endforelse
                    </div>
                    @endif
                    <div class="clear" id="comment-list">
                        <div class="comments-area style-1 clearfix" id="comments-div">
                            @if ($comments->isNotEmpty())
                            <div class="widget-title">
                                <h4 class="title">{{ $total_comments }} {{ _('COMMENTS') }}</h4>
                            </div>
                            <div class="clearfix">
                                <!-- comment list END -->
                                <ol class="comment-list mb-0">
                                    @forelse($comments as $comment)
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="comment-author vcard"> 
                                                @if (optional($comment->user)->profile && Storage::exists('public/user-images/'.$comment->user->profile))
                                                    <img class="avatar photo" src="{{ asset('storage/user-images/'.$comment->user->profile) }}" alt=""> 
                                                @else
                                                    <img class="avatar photo" src="{{ asset('images/no-user.png') }}" alt=""> 
                                                @endif
                                            </div>
                                            <div class="comment-info">
                                                <div class="title">
                                                    <cite class="fn">
                                                        {{ $comment->commenter }}
                                                    </cite>
                                                    <span>{{ \Carbon\Carbon::parse($comment->created_at)->format('d F, Y') }}</span>
                                                </div>
                                                <p>{{ $comment->comment }}</p>
                                                <div class="reply"> 
                                                    <a rel="nofollow" href="{{ DzHelper::laraBlogLink($blog->id) }}?replytocom={{ $comment->id }}#respond" class="comment-reply-link w3-comment-reply" data-commentid="{{ $comment->id }}" data-postid="{{ $blog->id }}"  data-replyto="Reply to {{ $comment->commenter }}"> 
                                                        <span><i class="fa-solid fa-reply"></i>{{ __('REPLY') }}</span>
                                                    </a> 
                                                </div>
                                            </div>
                                        </div>
                                        @if (isset($comment->child_comments) && $comment->child_comments->isNotEmpty())
                                            @include('elements.child_comments', ['comments' => $comment->child_comments,'parent_comment' => $comment->commenter, 'depth' => 1])
                                        @endif
                                    </li>
                                    @empty
                                    @endforelse
                                </ol>
                                <div class="mb-4">
                                    @if(config('Discussion.page_comments'))
                                        {!! $comments->links('elements.pagination') !!}
                                    @endif
                                </div>
                                <!-- comment list END -->
                            </div>
                            @endif
                            @if(!config('Discussion.registration_comment'))
                                <div id="ReplyFormContainer">
                                    @if(Session::has('unapprove_comment_error'))
                                        <div class="alert alert-danger alert-dismissible alert-alt fade show">
                                            <strong>{{ __('common.error') }}</strong> {{ Session::get('unapprove_comment_error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                        </div>
                                    @endif

                                    <div class="widget-title">
                                        <h4 class="title">{{ __('Leave A Reply') }}</h4>
                                    </div>
                                    <h5>
                                        <span id="reply-title"></span>
                                        <small class="fw-normal"> <a rel="nofollow" class="d-none" id="cancel-comment-reply" href="{{ DzHelper::laraBlogLink($blog->id) }}#respond">{{ __('Cancel reply') }}</a> </small>
                                    </h5>
                                    @auth
                                        <p> {{ __('You are Logged in as') }} <a href="{{ route('admin.users.profile') }}">{{ Auth::user()->name }}</a></p>
                                    @endauth
                                    <div class="clearfix">
                                        <!-- Form -->
                                        <div class="default-form comment-respond style-1" id="respond">
                                            <form action="{{ route('comments.admin.store') }}" class="comment-form row" id="commentform" method="post">
                                                @csrf
                                                <div class="container">
                                                    @error('commenter')
                                                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                            {{ $message }}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    @enderror
                                                    @error('email')
                                                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                            {{ $message }}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    @enderror
                                                    @error('comment')
                                                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                            {{ $message }}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    @enderror
                                                </div>
                                                @if( Session::get('success'))
                                                    <p class="m-b30">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            {{ Session::get('success') }}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    </p>
                                                @endif
                                                <input type="hidden" name="object_id" value="{{ $blog->id }}">
                                                <input type="hidden" name="parent_id" id="comment_parent" value="0">

                                                @guest
                                                    <div class="row">
                                                        <p class="comment-form-author">
                                                            <label>{{ __('Name') }} {!! $requiredFieldIndicator !!}</label>
                                                            <input type="text" name="commenter" placeholder="{{ __('Name') }}" id="commenter" value="{{ old('commenter', $comment_author) }}" {{ $isRequired }}>
                                                        </p>
                                                        <p class="comment-form-email">
                                                            <label>{{ __('Email') }} {!! $requiredFieldIndicator !!}</label>
                                                            <input type="email" placeholder="{{ __('Email') }}" name="email" id="email" value="{{ old('email', $comment_email) }}" {{ $isRequired }}>
                                                        </p>
                                                        <p class="comment-form-email w-100">
                                                            <label>{{ __('Website url') }}</label>
                                                            <input type="url" placeholder="{{ __('Website url') }}" name="profile_url" id="profileurl" value="{{ old('profile_url', $comment_url) }}">
                                                        </p>
                                                    </div>
                                                @endguest
                                                <p class="comment-form-comment">
                                                    <label>{{ __('Message') }}</label>
                                                    <textarea rows="8" name="comment" placeholder="{{ __('Comment') }}" id="comment">{{ old('comment') }}</textarea>
                                                </p>
                                                @guest
                                                    @if(config('Discussion.save_comments_cookie'))
                                                        <p class="comment-form-comment">
                                                            <label class="form-check-label d-block">
                                                                <input type="checkbox" name="set_comment_cookie" class="form-check-input" @checked($comment_author || $comment_email || $comment_url)>
                                                                {{ __('Remember details for future comments: Name, Email, and Website.') }}
                                                            </label>
                                                        </p>
                                                    @endif
                                                @endguest
                                                <p class="form-submit">
                                                    <button type="submit" class="btn btn-primary btn-skew btn-icon" id="submit"><span>{{ __('Submit Now') }}</span></button>
                                                </p>
                                            </form>
                                        </div>
                                        <!-- Form -->
                                    </div>
                                </div>
                            @else
                                <p>{{ __('Please') }} <a href="{{ route('admin.login') }}">{{ __('log in') }}</a> {{ __('to post a comment.') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @include('widgets.sidebar')
            @else
                <div class="col-12">{{ __('No record found.') }}</div>
            @endif
        </div>
    </div>
    <!-- Blog Detail End -->

@endsection