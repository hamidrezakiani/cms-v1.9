@extends('layout.default')

@php
    $requiredFieldIndicator = config('Discussion.name_email_require') ? DzHelper::requiredFieldIndicator() : '';
    $isRequired = config('Discussion.name_email_require') ? 'required' : '';
    $comment_author = !empty($_COOKIE['comment_author_'.config('constants.comment_cookie_hash')]) ? $_COOKIE['comment_author_'.config('constants.comment_cookie_hash')] : '';
    $comment_email = !empty($_COOKIE['comment_email_'.config('constants.comment_cookie_hash')]) ? $_COOKIE['comment_email_'.config('constants.comment_cookie_hash')] : '';
    $comment_url = !empty($_COOKIE['comment_website_'.config('constants.comment_cookie_hash')]) ? $_COOKIE['comment_website_'.config('constants.comment_cookie_hash')] : '';
@endphp

@section('content')
<!-- Content -->

    <!-- Page Details -->
    @if ($page)

        {{-- for showing only page content --}}
        @if ($page->visibility == 'PP' && $status == 'locked')
            @php
                $title = 'Password Protected';
            @endphp
            @include('elements.banner-inner', compact('title'))
            <div class="container">
                <form method="POST" action="" class="my-5 py-5">
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
                                <button type="submit" class="btn btn-primary btn-skew align-self-end">
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

            {{-- for child pages --}}
            @if (optional($page->child_pages)->isNotEmpty())
            <div class="container">
                <h4>{{ __('Related Pages') }}</h4>
                <ul class="related-pages p-l m-b30">
                    @forelse($page->child_pages as $child_page)
                    <li>
                        -<a href="{!! DzHelper::laraPageLink($child_page->id) !!}" class="pl-2">{{ $child_page->title }}</a>
                        @if ($child_page->child_pages->isNotEmpty())
                            {!! DzHelper::getChildPage($child_page->child_pages) !!}
                        @endif
                    </li>
                    @empty
                    @endforelse
                </ul>
            </div>
            @endif
            {{-- for child pages --}}
        @endif
        {{-- for showing only page content --}}

        <div class="clear container" id="comment-list">
            <div class=" style-1 clearfix" id="comments-div">
                @if($comments->isNotEmpty())
                <div class="row m-b30">
                    <div class="col-lg-3">
                        <div class="sticky-top">
                            <h6 class="title-style1 text-uppercase">{{ __('Reviews') }}</h6>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <!-- comment list END -->
                        <ol class="comment-list">
                            @forelse($comments as $comment)

                            <li class="comment">
                                <div class="comment-body">
                                    <div class="comment-content">
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                    <div class="comment-author vcard"> 
                                        @if (optional($comment->user)->profile && Storage::exists('public/user-images/'.$comment->user->profile))
                                            <img class="avatar photo" src="{{ asset('storage/user-images/'.$comment->user->profile) }}" alt=""> 
                                        @else
                                            <img class="avatar photo" src="{{ asset('images/no-user.png') }}" alt=""> 
                                        @endif
                                        <cite class="fn">{{ $comment->commenter }}</cite> <span class="says">{{ __('says') }}:</span> 
                                    </div>
                                    <div class="comment-meta"> 
                                        <a href="javascript:void(0);">{{ \Carbon\Carbon::parse($comment->created_at)->format('d / m / Y') }}</a> 
                                    </div>
                                    <div class="reply">
                                        <a rel="nofollow" href="{{ DzHelper::laraPageLink($page->id) }}?replytocom={{ $comment->id }}#respond" class="comment-reply-link bg-dark w3-comment-reply" data-commentid="{{ $comment->id }}" data-postid="{{ $page->id }}"  data-replyto="Reply to {{ $comment->commenter }}"> 
                                            <span>{{ __('REPLY') }}</span>
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
                        <!-- comment list END -->
                    </div>
                </div>
                @endif

                @if(!config('Discussion.registration_comment'))
                    <div class="" id="ReplyFormContainer">
                        @if(Session::has('unapprove_comment_error'))
                            <div class="alert alert-danger alert-dismissible alert-alt fade show">
                                <strong>{{ __('common.error') }}</strong> {{ Session::get('unapprove_comment_error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                            </div>
                        @endif
                        <div class="widget-title">
                            <h5 class="title">{{ __('Leave A Reply') }}</h5>
                        </div>
                        <h5>
                            <span id="reply-title"></span>
                            <small class="fw-normal"> <a rel="nofollow" class="d-none" id="cancel-comment-reply" href="{{ DzHelper::laraPageLink($page->id) }}#respond">{{ __('Cancel reply') }}</a> </small>
                        </h5>
                        @auth
                            <p>{{ __('You are Logged in as') }} <a href="{{ route('admin.users.profile') }}" class="font-weight-bold text-danger">{{ Auth::user()->name }}</a></p>
                        @endauth
                        <div class="clearfix">
                            <!-- Form -->
                            <div class="default-form comment-respond style-1" id="respond">
                                <form action="{{ route('comments.admin.store') }}" class="comment-form row" id="commentform" method="post">
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
                                    @if( Session::get('success'))
                                        <div class="col-12 m-b30">
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ Session::get('success') }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span style="font-size: 30px;" aria-hidden="true">&times;</span class="lead">
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                    <input type="hidden" name="object_id" value="{{ $page->id }}">
                                    <input type="hidden" name="parent_id" id="comment_parent" value="0">
                                    @guest
                                        <p class="col-sm-4 m-b30">
                                            <input type="text" name="commenter" placeholder="{{ __('Name') }}" id="commenter" {{ old('commenter', $comment_author) }} class="form-control" {{ $isRequired }}>
                                        </p>
                                        <p class="col-sm-4 m-b30">
                                            <input type="text" placeholder="{{ __('Email') }}" name="email" id="email" value="{{ old('email', $comment_email) }}" class="form-control" {{ $isRequired }}>
                                        </p>
                                        <p class="col-sm-4 m-b30">
                                            <input type="url" placeholder="{{ __('Website url') }}" name="profile_url" id="profileurl" {{ old('profile_url', $comment_url) }} class="form-control">
                                        </p>
                                    @endguest
                                    <p class="col-12 m-b30">
                                        <textarea rows="4" name="comment" placeholder="{{ __('Comment') }}" id="comment" class="form-control" style="height: auto;"></textarea>
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
                                    <p class="col-12 form-submit m-b30">
                                        <button href="#respond" type="submit" class="btn btn-dark btn-skew btn-icon" id="submit"><span>{{ __('Submit Now') }}</span></button>
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

    @else
        <div class="col-12">{{ __('No record found.') }}</div>
    @endif
    <!-- Page Details End -->


    <!-- Content end -->
@endsection