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
    <div class="content-inner">
        <div class="container">
            <div class="row">
            @if($blog)
                <div class="m-b40 {{ (DzHelper::dzHasSidebar()) ? 'col-xl-8 col-lg-8' : 'col-12' ; }}">
                    @if ($blog->visibility == 'PP' && $status == 'locked')
                        <form method="POST" action="" class="mb-5">
                            @csrf
                            <h6 class="text-primary mb-3">{{ __('This content is password protected. To view it please enter your password below:') }}</h6>
            
                            <div class=" row">
                                <div class="col-md-8 d-flex">
                                    <div class="input-area col-sm-8">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <div class=" input-line">
                                            <input id="password" type="password" class="form-control" required name="password">
                                        </div>
                                    </div>
            
                                    <div class="col-4 text-end d-flex justify-content-end">
                                        <button type="submit" class="btn btn-border shadow-primary btn-primary align-self-end">
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
                    <div class="dz-card style-1 blog-single">
                        <div class="dz-media">
                            <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                        </div>
                        <div class="dz-info">
                            <div class="dz-meta">
                                <ul>
                                    <li class="post-date"><i class="las la-calendar"></i> {{ $blog->publish_on }}</li>
                                    <li class="post-author"><a href="{{ DzHelper::author($blog->user_id) }}"><i class="las la-user"></i> {{ __('By') }} {{ optional($blog->user)->name }}</a></li>
                                </ul>
                            </div>
                            @php
                                if($blog->visibility != 'Pu'){
                                    $blog_visibility = $blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ');
                                }else {
                                    $blog_visibility = '';
                                }
                            @endphp
                            <h2 class="dz-title">{{ $blog_visibility }} {{ $blog->title }}</h2>
                            <p class="blog-excerpt fs-5">{{ optional($blog)->excerpt }}</p>
                            {!! $blog->content !!}
                        </div>
                        <div class="dz-share-post">
                            <div class="dz-social-icon">
                                <h6 class="title">{{ __('Share:') }}</h6>
                                <ul>
                                    <li><a class="fab fa-facebook-f" href="javascript:void(0);"></a></li>
                                    <li><a class="fab fa-instagram" href="javascript:void(0);"></a></li>
                                    <li><a class="fab fa-twitter" href="javascript:void(0);"></a></li>
                                </ul>
                            </div>
                            <div class="post-tags">
                                @forelse($blog->blog_tags as $blog_tag)
                                <a href="{{ DzHelper::laraBlogTagLink($blog_tag->id); }}">{{ $blog_tag->title }}</a>
                                @empty
                                <a href="javascript:void(0);">{{ __('No Tags.') }}</a>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(isset($blogs) && !empty($blogs))
                    <div class="widget-title">
                        <h4 class="title">{{ __('Related Blog') }}</h4>
                        <div class="dz-separator style-1 bg-primary mb-0"></div>
                    </div>
                    <div class="row m-b30 m-sm-b10">
                        @forelse($blogs as $related_blog)
                            <div class="col-lg-6 m-b30">
                                <div class="dz-card style-1 shadow overlay-shine">
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
                                        <h4 class="title"><a href="{!! DzHelper::laraBlogLink($related_blog->id) !!}">{{ $related_blog_visibility }}{{ Str::limit($related_blog->title, 35, ' ...') }}</a></h4>
                                        <p>{{ Str::limit($related_blog->excerpt, 60, ' ...') }}</p>
                                        <a href="{!! DzHelper::laraBlogLink($related_blog->id) !!}" class="btn btn-primary"><span>{{ __('Read More') }}</span></a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">{{ __('No Related Blogs found.') }}</div>
                        @endforelse
                    </div>
                    @endif
                    
                    <div class="clear" id="comment-list">
                        <div class="comments-area" id="comments-div">
                            <div class="clearfix">
                                <!-- comment list END -->
                                @if($comments->isNotEmpty())
                                    <div class="widget-title">
                                        <h4 class="title">{{ $total_comments }} {{ __('Comments') }}</h4>
                                        <div class="dz-separator style-1 bg-primary mb-0"></div>
                                    </div>
                                    <ol class="comment-list">
                                        @forelse($comments as $comment)
                                            <li class="comment">
                                                <div class="comment-body">
                                                    <div class="comment-author vcard"> 
                                                        @if (optional($comment->user)->profile && Storage::exists('public/user-images/'.$comment->user->profile))
                                                            <img class="avatar photo" src="{{ asset('storage/user-images/'.$comment->user->profile) }}" alt=""> 
                                                        @else
                                                            <img class="avatar photo" src="{{ asset('images/no-user.png') }}" alt=""> 
                                                        @endif 
                                                        <cite class="fn">
                                                            {{ $comment->commenter }}
                                                            <span class="user-select-none">{{ __('.') }}</span>
                                                            <span class="fs-6 user-select-none">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                                        </cite>
                                                    </div>
                                                    <p>{{ $comment->comment }}</p>
                                                    <div class="reply"> 
                                                        <a rel="nofollow" href="{{ DzHelper::laraBlogLink($blog->id) }}?replytocom={{ $comment->id }}#respond" class="comment-reply-link w3-comment-reply" data-commentid="{{ $comment->id }}" data-postid="{{ $blog->id }}"  data-replyto="Reply to {{ $comment->commenter }}"> 
                                                            <i class="fa fa-reply"></i>{{ __('Reply') }}
                                                        </a>
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
                                @endif
                                <!-- comment list END -->
                                <!-- Form -->
                                @if(!config('Discussion.registration_comment'))
                                    <div id="ReplyFormContainer">
                                        @if(Session::has('unapprove_comment_error'))
                                            <div class="alert alert-danger alert-dismissible alert-alt fade show">
                                                <strong>{{ __('common.error') }}</strong> {{ Session::get('unapprove_comment_error') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                            </div>
                                        @endif
                                        <div class="widget-title style-1 mb-3">
                                            <h4 class="comment-reply-title title">{{ __('Leave Your Comment') }}</h4>
                                            <div class="dz-separator style-1 bg-primary mb-0"></div>
                                        </div>
                                        <h5 class="d-none my-3">
                                            <span id="reply-title"></span>
                                            <small class="ms-2"> 
                                                <a rel="nofollow" class="d-none text-danger fw-normal fs-6 text" id="cancel-comment-reply" href="{{ DzHelper::laraBlogLink($blog->id) }}#respond">
                                                    {{ __('Cancel reply') }}
                                                </a>
                                            </small>
                                        </h5>
                                        @auth
                                            <p>{{ __('You are Logged in as') }} <a href="{{ route('admin.users.profile') }}">{{ Auth::user()->name }}</a></p>
                                        @endauth
                                        <div class="clearfix">
                                            <!-- Form -->
                                            <div class="default-form comment-respond style-1 mt-3" id="respond">
                                                <form action="{{ route('comments.admin.store') }}" class="comment-form row" id="commentform" method="post">
                                                    @csrf
                                                    <div class="container">
                                                        @error('commenter')
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                {{ $message }}
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                        @enderror
                                                        @error('email')
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                {{ $message }}
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                        @enderror
                                                        @error('comment')
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                {{ $message }}
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    @if( Session::get('success'))
                                                        <div class="col-12 m-b30">
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                {{ Session::get('success') }}
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <input type="hidden" name="object_id" value="{{ $blog->id }}">
                                                    <input type="hidden" name="parent_id" id="comment_parent" value="0">
                                                    @guest
                                                        <p class="comment-form-author">
                                                            <input type="text" name="commenter" placeholder="{{ __('Name') }}" id="commenter" {{ old('commenter', $comment_author) }} class="form-control" {{ $isRequired }}>
                                                        </p>
                                                        <p class="comment-form-email">
                                                            <input type="text" placeholder="{{ __('Email') }}" name="email" id="email" value="{{ old('email', $comment_email) }}" class="form-control" {{ $isRequired }}>
                                                        </p>
                                                        <p class="comment-form-url">
                                                            <input type="text" placeholder="{{ __('Website url') }}" name="profile_url" id="profileurl" {{ old('profile_url', $comment_url) }} class="form-control">
                                                        </p>
                                                    @endguest
                                                    <p class="comment-form-comment">
                                                        <textarea rows="8" name="comment" placeholder="{{ __('Comment') }}" id="comment" class="form-control">{{ old('comment') }}</textarea>
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
                                                        <button type="submit" class="btn btn-border shadow-primary btn-primary" id="submit">{{ __('SUBMIT') }}</button>
                                                    </p>
                                                </form>
                                            </div>
                                            <!-- Form -->
                                        </div>
                                    </div>
                                @else
                                    <p>{{ __('Please') }} <a href="{{ route('admin.login') }}">{{ __('log in') }}</a> {{ __('to post a comment.') }}</p>
                                @endif
                                <!-- Form -->
                            </div>
                        </div>
                    </div>
                </div>
                @include('widgets.sidebar')
            @else
                <div class="col-12">{{ __('No record found.') }}</div>
            @endif
            </div>
        </div>
    </div>
    <!-- Blog Detail End -->

@endsection