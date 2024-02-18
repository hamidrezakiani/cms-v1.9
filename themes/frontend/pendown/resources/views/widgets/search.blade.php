<div class="widget">
    <h6 class="widget-title text-center">
        <span>{{ __('Search') }}</span>
    </h6>    
    <div class="search-bx border-0 p-0">
        <form action="{{ route('permalink.search') }}" role="search" method="get">
            <div class="input-group">
                <input name="s" type="text" class="form-control" placeholder="{{ __('Search..') }}">
                <span class="input-group-append">
                    <button type="submit" class="btn"><i class="ti-search"></i></button>
                </span> 
            </div>
        </form>
    </div>
</div>