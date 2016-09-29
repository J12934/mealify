@if(isset($url))
    <a href="{{ $url }}" class="media-card-link">
@endif
        <div class="media-card" @if(isset($image)) style="background-image: url('{{ $image }}')" @endif>
            <div class="media-card-caption">
                @if(isset($title))
                    <h4 class="media-card-title">{{ $title }}</h4>
                @endif
                @foreach($subtitles as $subtitle)
                    <p class="media-card-subtitle">
                        {!! $subtitle['icon'] !!} {{ $subtitle['text'] }}
                    </p>
                @endforeach
            </div>
        </div>
@if(isset($url))
    </a>
@endif
