@extends('layout.default')

@php
    $requiredFieldIndicator = config('Discussion.name_email_require') ? DzHelper::requiredFieldIndicator() : '';
    $isRequired = config('Discussion.name_email_require') ? 'required' : '';
    $comment_author = !empty($_COOKIE['comment_author_'.config('constants.comment_cookie_hash')]) ? $_COOKIE['comment_author_'.config('constants.comment_cookie_hash')] : '';
    $comment_email = !empty($_COOKIE['comment_email_'.config('constants.comment_cookie_hash')]) ? $_COOKIE['comment_email_'.config('constants.comment_cookie_hash')] : '';
    $comment_url = !empty($_COOKIE['comment_website_'.config('constants.comment_cookie_hash')]) ? $_COOKIE['comment_website_'.config('constants.comment_cookie_hash')] : '';
@endphp

@section('meta_tags')
    <meta name="title" content="{{ $page->title }}"/>
    <meta name="keywords" content="{{ optional($pageSeo)->meta_keywords }}"/>
    <meta name="description" content="{{ optional($pageSeo)->meta_descriptions ? optional($pageSeo)->meta_descriptions : __('MyDiary - Blog HTML Template') }}"/>
    @if(config('Reading.public_blog_search'))
        <meta name="robots" content="noindex,nofollow"/>
    @endif
    <meta name="author" content="{{ optional($page->user)->name }}">
    <meta name="url" content="{{ request()->fullUrl() }}">
    <meta property="og:title" content="{{ $page->title ? $page->title : __('MyDiary - Blog HTML Template') }}"/>
    <meta property="og:description" content="{{ optional($pageSeo)->meta_descriptions ? optional($pageSeo)->meta_descriptions : __('MyDiary - Blog HTML Template') }}"/>
    @if(optional($page->feature_img)->value && Storage::exists('public/page-images/'.$page->feature_img->value))
        <meta property="og:image" content="{{ asset('storage/page-images/'.$page->feature_img->value) }}" />
    @else
        <meta property="og:image" content="https://w3cms.dexignzone.com/laravel/social-image.png" />
    @endif
    <meta property="og:sitename" content="{{ config('Site.title') }}" />
    <meta property="og:url" content="{{ request()->fullUrl() }}"/>
@endsection

@section('content')
<!-- Content -->

    <!-- Page Detail -->
    @if ($page)
        @if ($page->visibility == 'PP' && $status == 'locked')
        @php
            $title = 'Password Protected';
        @endphp
        @include('elements.banner-inner', compact('title'))
        <div class="container">
            <form method="POST" action="" class="my-5 py-5 mb-2">
                @csrf
                <h6 class="text-primary mb-3">{{ __('This content is password protected. To view it please enter your password below:') }}</h6>

                <div class=" row">
                    <div class="col-md-8 d-flex p-0">
                        <div class="input-area col-sm-8">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
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
        </div>
        @endif
        @if ($status == 'unlock_'.$page->id)
            {!! HelpDesk::shortcodeContent($page->content) !!}

            <!-- Child Pages Detail End -->
            @if (optional($page->child_pages)->isNotEmpty())
            <div class="container">
                <h4>{{ __('Related Pages') }}</h4>
                <ul class="related-pages p-l m-b30">
                    @forelse($page->child_pages as $child_page)
                    <li>
                        -<a href="{!! DzHelper::laraPageLink($child_page->id) !!}" class="pl-2 ">{{ $child_page->title }}</a>
                        @if ($child_page->child_pages->isNotEmpty())
                            {!! DzHelper::getChildPage($child_page->child_pages) !!}
                        @endif
                    </li>
                    @empty
                    @endforelse
                </ul>
            </div>
            @endif
            <!-- Child Pages Detail End -->
        @endif

        <div class="container" id="comments-div">
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
                                                <a rel="nofollow" href="{{ DzHelper::laraPageLink($page->id) }}?replytocom={{ $comment->id }}#respond" class="comment-reply-link w3-comment-reply" data-commentid="{{ $comment->id }}" data-postid="{{ $page->id }}"  data-replyto="Reply to {{ $comment->commenter }}"> 
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
                                <a rel="nofollow" class="d-none" id="cancel-comment-reply" href="{{ DzHelper::laraPageLink($page->id) }}#respond">{{ __('Cancel reply') }}</a>
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
                            <input type="hidden" name="object_id" value="{{ $page->id }}">
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
    @else
        <div class="col-12">{{ __('No record found.') }}</div>
    @endif
    <!-- Page Detail End -->
        
<!-- Content end -->
@endsection