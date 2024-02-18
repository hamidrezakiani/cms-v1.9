<section class="content-inner-2 bg-white">
    <div class="container">
        <div class="section-head style-1 text-center">
            @if(isset($args['subtitle']))
                <h5 class="sub-title text-primary">{{ $args['subtitle'] }}</h5>
            @endif
            <h3 class="title m-b30">{{ isset($args['title']) ? $args['title'] : '' }}</h3>
            <p class="m-b30">{{ isset($args['description']) ? $args['description'] : '' }}</p>
        </div>
        <div class="row">
            @if(isset($args['grouped']) && !empty($args['grouped']))
            @forelse($args['grouped'] as $progress)
            <div class="col-lg-3 col-md-6 m-b30">
                <div class="text-center">
                    <svg class="radial-progress m-b20" data-percentage="{{ $progress['progress'] }}" viewBox="0 0 80 80">
                        <circle class="basic-circle" cx="40" cy="40" r="35"></circle>
                        <circle class="incomplete" cx="40" cy="40" r="35"></circle>
                        <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 39.58406743523136;"></circle>
                        <text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">{{ $progress['progress'] }}{{ __('%') }}</text>
                    </svg>                      
                    <h3 class="title m-b0">{{ $progress['title'] }}</h3>
                    <p class="sub-title m-b0">{{ $progress['description'] }}</p>
                </div>
            </div>
            @empty
            @endforelse
            @endif
        </div>
    </div>
</section>