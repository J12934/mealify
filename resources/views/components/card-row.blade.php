<div class="row card-row">
    <div class="col-xs-12 col-sm-12 col-md card-row-header">
        <p class="card-row-heading">{{ $meal->name }}</p>
        <p class="card-row-subtitle"><span class="icon-user"></span> {{ $meal->user->name }} <span class="icon-date"></span> {{ $meal->created_at->diffForHumans() }}</p>
    </div>
    @foreach($meal->recipes as $recipe)
        <div class="col-xs">
            <a href="{{ route('recipe.show', $recipe->id) }}" class="media-card-link">
                @include('components.card')
            </a>
        </div>
    @endforeach
</div>