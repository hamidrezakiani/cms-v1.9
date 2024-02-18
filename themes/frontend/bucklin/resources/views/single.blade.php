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
<!-- Content -->

    @include('elements.banner-inner', compact('title'))
 
    <!-- Blog Details -->
    <div class="section-full content-inner bg-white">
        <div class="container">
            <div class="row">
                @if($blog)
                    <div class="{{ DzHelper::dzHasSidebar() ? 'col-lg-8 col-md-7 col-sm-12 col-12' : 'col-12' }}">
                        <div class="blog-post blog-single blog-post-style-2 sidebar">
                            <div class="dlab-post-info">
                                <div class="dlab-post-meta text-center">
                                    <ul>
                                        @forelse($blog_categories as $blogcategory)
                                        <li class="post-tag">
                                            <a href="{!! DzHelper::laraBlogCategoryLink($blogcategory->id) !!}">{{ $blogcategory->title }}</a>
                                        </li>
                                        @empty
                                        <li class="post-tag">{{ __('uncatagorized') }}</li>
                                        @endforelse
                                        <li class="post-date">{{ $blog->publish_on }}</li>
                                    </ul>
                                </div>
                                <div class="dlab-post-title text-center">
                                    @php
                                        if($blog->visibility != 'Pu'){
                                            $blog_visibility = $blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ');
                                        }else {
                                            $blog_visibility = '';
                                        }
                                    @endphp
                                    <h2 class="post-title">{{ $blog_visibility }}{{ $blog->title }}</h2>
                                </div>
                                @if ($blog->visibility == 'PP' && $status == 'locked')
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
                                                    <button type="submit" class="btn btn-primary align-self-end">
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
                                    <p class="blog-excerpt text-center">{{ optional($blog)->excerpt }}</p>
                                    <div class="dlab-post-text text hjkhjkg">
                                        <div class="wp-block-image alignwide">
                                            <figure class="aligncenter">
                                                @php
                                                    $imagepath = isset($blog->page_metas) ? 'page-images' : 'blog-images'; 
                                                @endphp
                                                <img src="{{ DzHelper::getStorageImage('storage/'.$imagepath.'/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                            </figure>
                                        </div>

                                        {!! $blog->content !!}

                                        @if(optional($blog->video)->value)
                                        <div>
                                            <iframe width="420" height="345" src="{{ $blog->video->value }}"></iframe>
                                        </div>
                                        @endif

                                    </div>

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
                                @endif   
                                <div class="post-footer">
                                    <div class="row ">
                                        <div class="col-lg-4 m-b30">                                               
                                            <span class="m-r5">{{ __('by') }}</span> <a href="{!! DzHelper::author($blog->user_id) !!}" class="text-uppercase">{{ optional($blog->user)->full_name ? optional($blog->user)->full_name : __('No Author') }}</a> 
                                        </div>
                                        @if ($blog->comment != 0)
                                        <div class="col-lg-4 m-b30">
                                            <div class="text-right">
                                                <a href="javascript:void(0);" class="text-uppercase">{{ __('Write A Comment') }}</a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(!empty($blogs))
                        <div class="min-container">
                            <div class="row m-b30">
                                <div class="col-lg-3">
                                    <div class="sticky-top">
                                        <h6 class="title-style1 text-uppercase">{{ __('Recent Posts') }}</h6>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        @forelse($blogs as $related_blog)
                                            <div class="col-lg-6">
                                                <div class="category-box overlay m-b30">
                                                    <div class="category-media">
                                                        <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$related_blog->feature_img->value) }}" alt="{{ __('Blog Image') }}" width="200" height="143">
                                                    </div>
                                                    <div class="category-info bg-dark p-a20 text-center">
                                                        <h6 class="title m-b0"><a href="{!! DzHelper::laraBlogLink($related_blog->id) !!}">{{ Str::limit($related_blog->title, 30, '...') }}</a></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-12">{{ __('No record found.') }}</div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="clear" id="comment-list">
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
                                                        <a href="javascript:void(0);">{{ $comment->created_at }}</a> 
                                                    </div>
                                                    <div class="reply">
                                                        <a rel="nofollow" href="{{ DzHelper::laraBlogLink($blog->id) }}?replytocom={{ $comment->id }}#respond" class="comment-reply-link bg-dark w3-comment-reply" data-commentid="{{ $comment->id }}" data-postid="{{ $blog->id }}"  data-replyto="Reply to {{ $comment->commenter }}"> 
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
                                    <div id="ReplyFormContainer">
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
                                            <small class="fw-normal"> <a rel="nofollow" class="d-none" id="cancel-comment-reply" href="{{ DzHelper::laraBlogLink($blog->id) }}#respond">{{ __('Cancel reply') }}</a> </small>
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
                                                    <input type="hidden" name="object_id" value="{{ $blog->id }}">
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
                    </div>
                    @include('widgets.sidebar')
                @else
                <div class="col-12">{{ __('No record found.') }}</div>
                @endif
            </div>
        </div>
    </div>
    <!-- Blog Details End -->

<!-- Content end -->
@endsection
