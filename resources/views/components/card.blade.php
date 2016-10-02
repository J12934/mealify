<div class="media-card" @if(isset($recipe->image)) style="background-image: url('{{ $recipe->image }}')" @endif>
    <div class="media-card-caption">
        <h4 class="media-card-title">{{ $recipe->name }}</h4>

        <p class="media-card-subtitle">
            <span class="icon-date"></span> {{ $recipe->created_at->diffForHumans() }}
        </p>
        <p class="media-card-subtitle">
            @foreach($recipe->categories as $category)
                <span class="tag category-tag">{{ $category->name }}</span>
            @endforeach
        </p>
    </div>
</div>