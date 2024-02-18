@if(config('Discussion.thread_comments') && $depth < config('Discussion.thread_comments_depth'))
    <ol class="children">
        @php
            $depth++;
        @endphp
    	@forelse($comments as $comment)
            <li class="comment">
                <div class="comment-body">
                    <div class="comment-content">
                        <p><span class="text-primary text-lowercase mr-2 font-weight-bold font-italic">{{ __('@') }}{{ str_replace(' ', '', $parent_comment) }} </span>{{ $comment->comment }}</p>
                    </div>
                    <div class="comment-author vcard"> 
                        @if (optional($comment->user)->profile && Storage::exists('public/user-images/'.$comment->user->profile))
                            <img class="avatar photo" src="{{ asset('storage/user-images/'.$comment->user->profile) }}" alt=""> 
                        @else
                            <img class="avatar photo" src="{{ asset('images/no-user.png') }}" alt=""> 
                        @endif
                        <cite class="fn">{{ $comment->commenter }}</cite> <span class="says">{{ __('says:') }}</span> 
                    </div>
                    <div class="comment-meta"> 
                        <a href="javascript:void(0);">{{ \Carbon\Carbon::parse($comment->created_at)->format('d / m / Y') }}</a> 
                    </div>
                    <div class="reply">
                        @if($comment->object_type=="1")
                            <a rel="nofollow" href="{{ DzHelper::laraBlogLink($comment->object_id) }}?replytocom={{ $comment->id }}#respond" class="comment-reply-link bg-dark w3-comment-reply" data-commentid="{{ $comment->id }}" data-postid="{{ $comment->object_id }}"  data-replyto="Reply to {{ $comment->commenter }}">
                                <span>{{ __('REPLY') }}</span>
                            </a>
                        @else
                            <a rel="nofollow" href="{{ DzHelper::laraBlogLink($page->id) }}?replytocom={{ $comment->id }}#respond" class="comment-reply-link bg-dark w3-comment-reply" data-commentid="{{ $comment->id }}" data-postid="{{ $blog->id }}"  data-replyto="Reply to {{ $comment->commenter }}"> 
                                <span>{{ __('REPLY') }}</span>
                            </a>
                        @endif
                    </div>
                </div>
                @if (isset($comment->child_comments) && $comment->child_comments->isNotEmpty())
                    @include('elements.child_comments', ['comments' => $comment->child_comments,'parent_comment' => $comment->commenter, 'depth' => $depth])
                @endif
            </li>
    	@empty
    	@endforelse
    </ol>
@else
    @forelse($comments as $comment)
        <li class="comment">
            <div class="comment-body">
                <div class="comment-content">
                    <p><span class="text-primary text-lowercase mr-2 font-weight-bold font-italic">{{ __('@') }}{{ str_replace(' ', '', $parent_comment) }} </span>{{ $comment->comment }}</p>
                </div>
                <div class="comment-author vcard"> 
                    @if (optional($comment->user)->profile && Storage::exists('public/user-images/'.$comment->user->profile))
                        <img class="avatar photo" src="{{ asset('storage/user-images/'.$comment->user->profile) }}" alt=""> 
                    @else
                        <img class="avatar photo" src="{{ asset('images/no-user.png') }}" alt=""> 
                    @endif
                    <cite class="fn">{{ $comment->commenter }}</cite> <span class="says">{{ __('says:') }}</span> 
                </div>
                <div class="comment-meta"> 
                    <a href="javascript:void(0);">{{ \Carbon\Carbon::parse($comment->created_at)->format('d / m / Y') }}</a> 
                </div>
                <div class="reply">
                    @if($comment->object_type=="1")
                        <a rel="nofollow" href="{{ DzHelper::laraBlogLink($comment->object_id) }}?replytocom={{ $comment->id }}#respond" class="comment-reply-link bg-dark w3-comment-reply" data-commentid="{{ $comment->id }}" data-postid="{{ $comment->object_id }}"  data-replyto="Reply to {{ $comment->commenter }}">
                            <span>{{ __('REPLY') }}</span>
                        </a>
                    @else
                        <a rel="nofollow" href="{{ DzHelper::laraBlogLink($page->id) }}?replytocom={{ $comment->id }}#respond" class="comment-reply-link bg-dark w3-comment-reply" data-commentid="{{ $comment->id }}" data-postid="{{ $blog->id }}"  data-replyto="Reply to {{ $comment->commenter }}"> 
                            <span>{{ __('REPLY') }}</span>
                        </a>
                    @endif
                </div>
            </div>
            @if (isset($comment->child_comments) && $comment->child_comments->isNotEmpty())
                @include('elements.child_comments', ['comments' => $comment->child_comments,'parent_comment' => $comment->commenter, 'depth' => $depth])
            @endif
        </li>
    @empty
    @endforelse
@endif