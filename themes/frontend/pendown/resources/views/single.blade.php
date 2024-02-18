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
                <div class="m-b40 {{ (DzHelper::dzHasSidebar()) ? 'col-lg-8 col-md-8 col-sm-12 col-12' : 'col-12' ; }}">
                    @if ($blog->visibility == 'PP' && $status == 'locked')
                    <form method="POST" action="" class="mb-5 pb-5">
                        @csrf
                        <h6 class="text-primary mb-3">{{ __('This content is password protected. To view it please enter your password below:') }}</h6>
        
                        <div class=" row">
                            <div class="col-md-8 d-flex p-0">
                                <div class="input-area col-sm-8">
                                    <label for="password" class="form-control-label">{{ __('Password') }}</label>
                                    <div class=" input-line">
                                        <input id="password" type="password" class="form-control" required name="password">
                                    </div>
                                </div>
        
                                <div class="col-4 text-end d-flex justify-content-end">
                                    <button type="submit" class="btn align-self-end">
                                        <span>{{ __('Login') }}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @error('password')
                            <p class="text-danger mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </form>
                    @endif
                    @if ($status == 'unlock_'.$blog->id)
                    <div class="blog-post blog-single sidebar">
                        <div class="dlab-info">
                            <div class="dlab-meta">
                                <ul>
                                    <li class="post-author"><span>{{ __('by') }}</span> <a href="{{ DzHelper::author($blog->user_id) }}">{{ optional($blog->user)->name }}</a></li>
                                    <li class="post-category">{{ __('in') }}
                                        @forelse($blog->blog_categories as $blog_category)
                                        <a href="{{ DzHelper::laraBlogCategoryLink($blog_category->id) }}">{{ $blog_category->title }},</a>
                                        @empty
                                            <a href="javascript:void(0);">{{ __('No record found.') }}</a>
                                        @endforelse
                                    </li>
                                    <li class="post-date">{{ __('at') }} <span>{{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}</span></li>
                                </ul>
                            </div>
                            @php
                                if($blog->visibility != 'Pu'){
                                    $blog_visibility = $blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ');
                                }else {
                                    $blog_visibility = '';
                                }
                            @endphp
                            <h2 class="dlab-title">{{ $blog_visibility }} {{ $blog->title }}</h2>
                            <div class="dlab-media mb-3">
                                <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                            </div>
                            <h5 class="blog-excerpt">{{ optional($blog)->excerpt }}</h5>

                            {!! $blog->content !!}

                            <div class="post-footer">
                                <div class="dlab-meta">
                                    <span>{{ __('Tags') }} : &nbsp;</span>
                                    <ul class="tag-list">
                                        @forelse($blog->blog_tags as $blog_tag)
                                        <li class="post-tag"><a href="{{ DzHelper::laraBlogTagLink($blog_tag->id) }}">{{ $blog_tag->title }}</a></li>
                                        @empty
                                        <a href="javascript:void(0);">{{ __('No record found.') }}</a>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(!empty($blogs))
                        <h6 class="widget-title text-center">
                            <span>{{ __('RELATED BLOGS') }}</span>
                        </h6>
                        <div class="row">
                            @forelse($blogs as $related_blog)
                                <div class="col-lg-6">
                                    <div class="dlab-card blog-grid h-100 ">
                                        <div class="dlab-media">
                                            <a href="{{ DzHelper::laraBlogLink($related_blog->id) }}">
                                                <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$related_blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                            </a>
                                        </div>
                                        <div class="dlab-info">
                                            <div class="dlab-meta">
                                                <ul>
                                                    <li class="post-category">
                                                        <a href="{{ DzHelper::laraBlogCategoryLink(optional(optional($related_blog->blog_categories)[0])->id) }}">{{ optional(optional($related_blog->blog_categories)[0])->title }}</a>, 
                                                        <a href="{{ DzHelper::laraBlogCategoryLink(optional(optional($related_blog->blog_categories)[1])->id) }}">{{ optional(optional($related_blog->blog_categories)[1])->title }}</a>
                                                    </li>
                                                    <li class="post-date">{{ __('at') }} <span>{{ Carbon\Carbon::parse($related_blog->publish_on)->format(config('Site.custom_date_format')) }}</span></li>
                                                </ul>
                                            </div>
                                            @php
                                                if($related_blog->visibility != 'Pu'){
                                                    $related_blog_visibility = $related_blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ') ;
                                                }else {
                                                    $related_blog_visibility = '';
                                                }
                                            @endphp
                                            <h4 class="dlab-title"><a href="{{ DzHelper::laraBlogLink($related_blog->id) }}">{{ $related_blog_visibility }}{{ Str::limit($related_blog->title, 35, ' ...') }}</a></h4>
                                            <p>{{ Str::limit($related_blog->excerpt, 60, ' ...') }}</p>
                                            <div class="dlab-feed">
                                                <ul>
                                                    <li class="post-dislike"><a href="javascript:void(0);"><i class="ti-comment-alt"></i><span>{{ $related_blog->blog_comments->count() }}</span></a></li>
                                                    <li class="post-share"><a href="{{ DzHelper::laraBlogLink($related_blog->id) }}"><span>{{ __('Read more') }}</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12">{{ __('No record found.') }}</div>
                            @endforelse
                        </div>
                    @endif

                    <div id="comments-div">
                        <div class="clear m-b30" id="comment-list">
                            <div class="comments-area mt-4" id="comments">
                                @if($comments->isNotEmpty())
                                <div class="section-head text-center">
                                    <span>{{ $total_comments }} {{ __('Comments') }}</span>
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
                                                    <cite class="fn">{{ $comment->commenter }}</cite> 
                                                    <span class="says">{{ __('says:') }}</span> 
                                                    <div class="comment-meta"> <a href="javascript:void(0);">{{ $comment->created_at }}</a> </div>
                                                    <div class="reply"> 
                                                        <a rel="nofollow" href="{{ DzHelper::laraBlogLink($blog->id) }}?replytocom={{ $comment->id }}#respond" class="comment-reply-link w3-comment-reply" data-commentid="{{ $comment->id }}" data-postid="{{ $blog->id }}"  data-replyto="Reply to {{ $comment->commenter }}"> 
                                                            {{ __('REPLY') }}
                                                        </a>
                                                    </div>
                                                    <div class="comment-content">
                                                        <p>{{ $comment->comment }}</p>
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
                                @endif
                            </div>
                        </div>
                        <!-- Form -->
                        @if(!config('Discussion.registration_comment'))
                            <div class="comments-area" id="ReplyFormContainer" >
                                <div class="comment-respond" id="respond">
                                    @if(Session::has('unapprove_comment_error'))
                                        <div class="alert alert-danger alert-dismissible alert-alt fade show">
                                            <strong>{{ __('common.error') }}</strong> {{ Session::get('unapprove_comment_error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                        </div>
                                    @endif
                                    <div class="section-head text-center">
                                        <span>{{ __('LEAVE A REPLY') }}</span>
                                    </div>
                                    <h3 class="comment-reply-title">
                                        <span id="reply-title"></span>
                                        <small> 
                                            <a rel="nofollow" class="d-none" id="cancel-comment-reply" href="{{ DzHelper::laraBlogLink($blog->id) }}#respond">{{ __('Cancel reply') }}</a>
                                         </small>
                                    </h3>
                                    @auth
                                        <p>{{ __('You are Logged in as') }} <a href="{{ route('admin.users.profile') }}">{{ Auth::user()->name }}</a></p>
                                    @endauth
                                    <form class="comment-form" action="{{ route('comments.admin.store') }}" id="commentform" method="post">
                                        @csrf
                                        <div class="container">
                                            @error('commenter')
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    {{ $message }}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span style="font-size: 30px;" aria-hidden="true">&times;</span class="lead">
                                                    </button>
                                                </div>
                                            @enderror
                                            @error('email')
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    {{ $message }}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span style="font-size: 30px;" aria-hidden="true">&times;</span class="lead">
                                                    </button>
                                                </div>
                                            @enderror
                                            @error('comment')
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    {{ $message }}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span style="font-size: 30px;" aria-hidden="true">&times;</span class="lead">
                                                    </button>
                                                </div>
                                            @enderror
                                        </div>
                                        <input type="hidden" name="object_id" value="{{ $blog->id }}">
                                        <input type="hidden" name="parent_id" id="comment_parent" value="0">
                                        @guest
                                            <p class="comment-form-author">
                                                <label for="commenter">{{ __('Name') }} {!! $requiredFieldIndicator !!}</label>
                                                <input type="text" name="commenter" value="{{ old('commenter') }}" placeholder="{{ __('Name') }}" id="commenter" {{ $isRequired }}>
                                            </p>
                                            <p class="comment-form-email">
                                                <label for="email">{{ __('Email') }} {!! $requiredFieldIndicator !!}</label>
                                                <input type="text" name="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" id="email" {{ $isRequired }}>
                                            </p>
                                            <p class="comment-form-email w-100">
                                                <label for="profile_url">{{ __('Website url') }}</label>
                                                <input type="text" name="profile_url" value="{{ old('profile_url') }}" placeholder="{{ __('Website url') }}" id="profile_url">
                                            </p>
                                        @endguest
                                        <p class="comment-form-comment">
                                            <label for="comment">{{ __('Comment') }}</label>
                                            <textarea rows="8" name="comment" placeholder="{{ __('Add a Comment') }}" id="comment"></textarea>
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
                                            <input type="submit" value="{{ __('Post Comment') }}" class="btn radius-no secondry" id="submit">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        @else
                            <p>{{ __('Please') }} <a href="{{ route('admin.login') }}">{{ __('log in') }}</a> {{ __('to post a comment.') }}</p>
                        @endif
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