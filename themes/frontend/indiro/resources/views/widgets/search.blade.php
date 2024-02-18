<div class="widget style-1">
    <div class="widget-title">
        <h4 class="title">{{ __('Search') }}</h4>
    </div>
    <div class="search-bx">
        <form action="{{ route('permalink.search') }}" role="search" method="get">
            <div class="input-group">
                <input name="s" type="text" class="form-control" placeholder="{{ __('Search Here...') }}">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary sharp radius-no"><i class="la la-search scale3"></i></button>
                </span> 
            </div>
        </form>
    </div>
</div>