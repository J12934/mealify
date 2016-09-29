<div class="media-card" @if(isset($image)) style="background-image: url('{{ $image }}')" @endif>
    <div class="media-card-caption">
        <h4 class="media-card-title">{{ $title }}</h4>
        <p class="media-card-subtitle"><span class="icon-user"></span> {{ $user }}</p>
    </div>
</div>