<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-8 d-flex flex-wrap justify-content-center align-items-center">
            @foreach($games as $game_d)
                <a class="text-decoration-none px-2 py-1 rounded-2 @if($game->id === $game_d->id) bg-info text-white @endif" 
                href="@if($nextGame->id === $game_d->id){{route('bet.nextGame', ['game'=>$game_d])}} @else{{route('bet.time_validation', ['game'=>$game_d])}}@endif">{{$game_d->id}}</a>
            @endforeach
        </div>
    </div>
</div>