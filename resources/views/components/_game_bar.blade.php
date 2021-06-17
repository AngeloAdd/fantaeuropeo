    <div class="row justify-content-center align-items-center mb-5 w-100 mx-0 px-3">
        <div class="col-12 col-sm-6 offset-md-2 d-md-none d-flex justify-content-center my-3">
            <form method="GET" action="{{route('bet.input', compact('game'))}}">
                @csrf
                <input value="{{$game->id - 1}}" type="hidden" name="game_id">
                <button class="btn btn-outline-danger" type="submit">
                    <i class="bi bi-caret-left-fill"></i>
                </button>
            </form>
            <form class="w-100 mx-1" method="GET" action="{{route('bet.input', compact('game'))}}">
                @csrf
                <div class="mb-3 input-group">
                    <input min="0" max="51" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="number" class="result-input form-control" name="game_id" placeholder="Incontro N°" autocomplete="off">
                    <button class="btn text-light btn-danger" type="submit">vai</button>
                </div>
            </form>
            <form method="GET" action="{{route('bet.input', compact('game'))}}">
                @csrf
                <input value="{{$game->id + 1}}" type="hidden" name="game_id">
                <button class="btn btn-outline-danger" type="submit">
                    <i class="bi bi-caret-right-fill"></i>
                </button>
            </form>
            
        </div>
        <div class="col-12 col-sm-8 offset-md-3 col-lg-6 offset-lg-2 justify-content-center my-3">
            <form class="w-100" method="GET" action="{{route('bet.input', compact('game'))}}">
                @csrf
                <div class="mb-3 input-group">
                    <select class="form-select form-select-sm" name="game_id" aria-label="form-select-sm">
                        <option selected>--Seleziona Un Match--</option>
                        @foreach($games as $game_d)
                            @if($game_d->home_team !== 'null' && $game_d->away_team !== 'null')
                                <option value="{{$game_d->id}}">
                                        {{$game_d->home_team}} - {{$game_d->away_team}}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    <button class="btn text-light btn-danger" type="submit">vai</button>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-9 offset-md-3 col-xl-10 offset-xl-2 d-none d-md-flex flex-wrap justify-content-center align-items-center">
            @foreach($games as $game_d)
                <a class="text-decoration-none px-2 py-1 rounded-2 @if($game_d->id < $nextGame->id) text-info @endif @if($game->id === $game_d->id) bg-info text-white @endif @if($nextGame->id === $game_d->id) bg-success text-white @endif" 
                href="{{route('bet.menu', ['game'=>$game_d])}}">{{$game_d->id}}</a>
            @endforeach
        </div>
    </div>