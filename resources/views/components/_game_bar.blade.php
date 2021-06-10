    <div class="row justify-content-center align-items-center mb-5 w-100 mx-0 px-3">
        <div class="col-12 col-sm-6 d-md-none d-flex justify-content-center my-3">
            <form class="w-100" method="GET" action="{{route('bet.input', compact('game'))}}">
                @csrf
                <div class="mb-3 input-group">
                    <input min="0" max="51" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="number" class="result-input form-control" name="game_id" placeholder="Incontro N°" autocomplete="off">
                    <button class="btn text-light btn-danger" type="submit">vai</button>
                </div>
            </form>
        </div>
        <div class="col-12 d-none d-md-flex flex-wrap justify-content-center align-items-center">
            @foreach($games as $game_d)
                <a class="text-decoration-none px-2 py-1 rounded-2 @if($game_d->id < $nextGame->id) text-info @endif @if($game->id === $game_d->id) bg-info text-white @endif @if($nextGame->id === $game_d->id) bg-success text-white @endif" 
                href="{{route('bet.menu', ['game'=>$game_d])}}">{{$game_d->id}}</a>
            @endforeach
        </div>
    </div>