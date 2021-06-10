<x-layout>

    <div class="container-fluid justify-content-center py-4 container-homepage-customr">
        <div class="row justify-content-center">
            <div class="col-6">
                @if(session('message'))
                    <div class="alert alert-dark text-center text-dark">
                        {{session('message')}}
                    </div>
                @endif
            </div>
        </div>
    <x-_game_bar :nextGame="$next_game" :games="$games" :game="$game"/>

        @if(Carbon\Carbon::now()->gte(new Carbon\Carbon($game->game_date)))
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="container-fluid p-5">
                        <ul class="list-group list-group-horizontal row @if($game->id < 0) justify-content-center @endif">
                            <li class="list-group-item col-2 overflow-auto title-font text-bold">Nome Giocatore</li>
                            <li class="list-group-item col-1 overflow-auto title-font text-bold">Risultato {{$game->home_team}}</li>
                            <li class="list-group-item col-1 overflow-auto title-font text-bold">Risultato {{$game->away_team}}</li>
                            <li class="list-group-item col-1 overflow-auto title-font text-bold">Segno</li>

                            @if($game->id > 36)
                            <li class="list-group-item col-2 overflow-auto title-font text-bold">Gol/Nogol/Autogol {{$game->home_team}}</li>
                            <li class="list-group-item col-2 overflow-auto title-font text-bold">Gol/Nogol/Autogol {{$game->away_team}}</li>
                            @endif

                            <li class="list-group-item col-3 overflow-auto title-font text-bold">Ultimo Update</li>
                        </ul>

                        @php
                            $bets= [];

                            foreach($game->bets as $bet){
                                array_push($bets, $bet);
                            }

                            function customSort($a, $b)
                            {
                                if((new Carbon\Carbon($a->updated_at))->gt((new Carbon\Carbon($b->updated_at)))){
                                    return 1;
                                } else {
                                    return 0;
                                }
                            }
                            usort($bets, "customSort");
                            $sortedBets = array_reverse($bets, true);
                        @endphp

                        @foreach($sortedBets as $key => $bet)
                            
                            <ul class="list-group list-group-horizontal row @if($game->id < 0) justify-content-center @endif my-1">
                                <li class="list-group-item col-2 overflow-auto @if($key%2 !== 0) bg-dark border-info text-light @endif">{{$bet->user->name}}</li>
                                <li class="list-group-item col-1 overflow-auto @if($key%2 !== 0) bg-dark border-info text-light @endif">{{$bet->home_result}}</li>
                                <li class="list-group-item col-1 overflow-auto @if($key%2 !== 0) bg-dark border-info text-light @endif">{{$bet->away_result}}</li>
                                <li class="list-group-item col-1 overflow-auto @if($key%2 !== 0) bg-dark border-info text-light @endif">{{$bet->sign}}</li>

                                @if($game->id > 36)
                                <li class="list-group-item col-2 overflow-auto @if($key%2 !== 0) bg-dark border-info text-light @endif">{{$bet->home_score}}</li>
                                <li class="list-group-item col-2 overflow-auto @if($key%2 !== 0) bg-dark border-info text-light @endif">{{$bet->away_score}}</li>
                                @endif

                                <li class="list-group-item col-3 overflow-auto @if($key%2 !== 0) bg-dark border-info text-light @endif" title="ore {{(new Carbon\Carbon($bet->updated_at))->format('H:i:s')}} e {{(new Carbon\Carbon($bet->updated_at))->format('u')}} millisecondi">
                                    {{(new Carbon\Carbon($bet->updated_at))->format('d/m/Y - H:i:s')}}
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            @php
                $userBet = App\Models\Bet::where('user_id', Auth::user()->id)->first();
            @endphp
            @if(isset($userBet))
                <h2 class="text-center w-100">Hai già un pronostico all'attivo eccolo qui. Se vuoi puoi modificarlo:</h2>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="container-fluid p-5">
                            <ul class="list-group list-group-horizontal row @if($game->id < 0) justify-content-center @endif">
                                <li class="list-group-item col-2 overflow-auto title-font text-bold">Nome Giocatore</li>
                                <li class="list-group-item col-1 overflow-auto title-font text-bold">Risultato {{$game->home_team}}</li>
                                <li class="list-group-item col-1 overflow-auto title-font text-bold">Risultato {{$game->away_team}}</li>
                                <li class="list-group-item col-1 overflow-auto title-font text-bold">Segno</li>

                                @if($game->id > 36)
                                <li class="list-group-item col-2 overflow-auto title-font text-bold">Gol/Nogol/Autogol {{$game->home_team}}</li>
                                <li class="list-group-item col-2 overflow-auto title-font text-bold">Gol/Nogol/Autogol {{$game->away_team}}</li>
                                @endif

                                <li class="list-group-item col-3 overflow-auto title-font text-bold">Ultimo Update</li>
                            </ul>
                                                            
                            <ul class="list-group list-group-horizontal row @if($game->id < 0) justify-content-center @endif my-1">
                                <li class="list-group-item col-2 overflow-auto bg-dark border-info text-light">{{$userBet->user->name}}</li>
                                <li class="list-group-item col-1 overflow-auto bg-dark border-info text-light">{{$userBet->home_result}}</li>
                                <li class="list-group-item col-1 overflow-auto bg-dark border-info text-light">{{$userBet->away_result}}</li>
                                <li class="list-group-item col-1 overflow-auto bg-dark border-info text-light">{{$userBet->sign}}</li>

                                @if($game->id > 36)
                                <li class="list-group-item col-2 overflow-auto bg-dark border-info text-light">{{$userBet->home_score}}</li>
                                <li class="list-group-item col-2 overflow-auto bg-dark border-info text-light">{{$userBet->away_score}}</li>
                                @endif

                                <li class="list-group-item col-3 overflow-auto bg-dark border-info text-light" title="ore {{(new Carbon\Carbon($userBet->updated_at))->format('H:i:s')}} e {{(new Carbon\Carbon($userBet->updated_at))->format('u')}} millisecondi">
                                    {{(new Carbon\Carbon($userBet->updated_at))->format('d/m/Y - H:i:s')}}
                                </li>
                            </ul>
                            <div class="row justify-content-center">
                                <div class="col-6 d-flex justify-content-center my-4">
                                    <a href="{{route('bet.edit', ['bet'=> $userBet])}}" class="btn btn-danger text-light">Modifica Pronostico</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card shadow">
                        <div class="card-header shadow bg-success text-light mx-3 next-match-header-custom rounded-2 border-success">
                            <div class="container-fluid px-0 py-0">
                                <div class="row p-0 justify-content-around">
                                    <div class="col-5 col-md-4 order-md-1 d-flex flex-column jsutify-content-center align-items-center py-3">
                                        <p class="title-font fs-4 m-1">{{$game->home_team}}</p>
                                        <img src="{{Storage::url($home_team->flag)}}" class="img-fluid" width="120" height="80" alt="">
                                    </div>
                                    <div class="col-2 d-flex align-items-center justify-content-center display-5 title-font py-3 mt-4 d-md-none">VS</div>
                                    <div class="col-5 col-md-4 order-md-3 d-flex flex-column jsutify-content-center align-items-center py-3">
                                        <p class="title-font fs-4 m-1">{{$game->away_team}}</p>
                                        <img src="{{Storage::url($away_team->flag)}}" class="img-fluid" width="120" height="80" alt="">
                                    </div>
                                    <div class="col-12 w-100 text-light text-center my-3 fs-5">
                                        Inserisci Pronostico per l'incontro n°{{$game->id}}
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="card-body pt-0">
                                <div class="container-fluid justify-content-center align-items-center">
                                    <div class="justify-content-center align-items-center row">
                                        <div class="col-12 d-flex align-items-center flex-column jsutify-content-center">
                                            <h2 class="card-title text-dark display-6 title-font">Pronostico</h2>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{route('bet.store', compact('game'))}}" method="POST">
                                    @csrf
                                    <div class="justify-content-center align-items-center flex-column container-fluid px-1">

                                        <div class="mb-3 row justify-content-center align-items-center border border-info border-1 pb-4 px-2 rounded-2 shadow">
                                            <div class="text-dark w-100 text-center col-12 my-3 px-0">Inserisci il risultato esatto per {{$game->home_team}} vs {{$game->away_team}}.</div>
                                            <label for="resultHome" class="col-12 order-md-1 px-0 col-md-4 form-label text-dark d-flex align-items-center justify-content-center">
                                                <p class="m-0 text-center">
                                                    Risultato Esatto Casa
                                                </p>
                                                <span class="fs-5 title-font mx-3 d-flex align-items-start">
                                                    {{$game->home_team}}
                                                </span>
                                            </label>
                                            <div class="col-12 order-md-2 col-md-2 px-md-2 px-0">
                                                <input type="number" min="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="home_result" class="result-input form-control text-dark @error('home_result') px-3 is-invalid @enderror" id="resultHome">
                                            </div>
                                            <label for="resultAway" class="col-12 order-md-4 col-md-4 mt-3 mt-md-0 px-0 form-label text-dark d-flex align-items-center justify-content-center">
                                                <p class="m-0 order-md-2 text-center">
                                                    Risultato Esatto FuoriCasa
                                                </p>
                                                <span class="order-md-1 fs-5 title-font mx-3 d-flex align-items-start">
                                                        {{$game->away_team}}
                                                </span>
                                            </label>
                                            <div class="col-12 col-md-2 px-md-2 px-0 order-md-3">
                                                <input type="number" min="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="away_result" class="result-input form-control text-dark @error('away_result') px-3 is-invalid @enderror" id="resultAway">
                                            </div>
                                            @error('home_result')
                                                <span class="text-danger d-flex justify-content-start align-items-center" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @error('away_result')
                                                <span class="text-danger d-flex justify-content-start align-items-center" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3 row justify-content-center align-items-center flex-column flex-md-row text-dark border border-1 rounded-2 border-info pb-3 shadow">
                                            <div class="text-dark w-100 text-center col-12 my-3">Inserisci Segno 1X2 @error('sign')<span class="text-danger text-bold fs-5">*</span>@enderror </div>
                                            <div class="form-check col-12 col-md-4 d-flex justify-content-start align-items-center">
                                                <input class="form-check-input mx-2 mt-0" type="radio" name="sign" id="home_victory" value="1">
                                                <label class="form-check-label" for="home_victory">
                                                    1: Vittoria {{$game->home_team}}
                                                </label>
                                            </div>
                                            <div class="form-check col-12 col-md-4 d-flex justify-content-start align-items-center">
                                                <input class="form-check-input mx-2 mt-0" type="radio" name="sign" value="X" id="draw">
                                                <label class="form-check-label" for="draw">
                                                    X: Pareggio
                                                </label>
                                            </div>
                                            <div class="form-check col-12 col-md-4 d-flex justify-content-start align-items-center">
                                                <input class="form-check-input mx-2 mt-0" type="radio" name="sign" id="away_victory" value="2">
                                                <label class="form-check-label" for="away_victory">
                                                    2: Vittoria {{$game->away_team}}
                                                </label>
                                            </div>
                                            @error('sign')
                                                <span class="text-danger d-flex justify-content-start align-items-center" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        @if($game->id > 36)
                                        <div class="mb-3 px-2 row justify-content-center align-items-center border border-1 border-info rounded-2 shadow pb-3">
                                            <div class="text-dark w-100 text-center col-12 my-3">Inserisci Pronostico Gol/NoGol (Uno per squadra) @error('sign')<span class="text-danger text-bold fs-5">*</span>@enderror </div>
                                            <label class="form-label col-12 col-md-2 px-0 d-flex justify-content-center align-items-center" for="homeScore">
                                                Gol {{$game->home_team}}
                                            </label>
                                            <div class="col-12 col-md-4 px-md-2 px-0 d-flex justify-content-center align-items-center position-relative" id="homeScoreContainer">
                                                <select name="homeScore" id="homeScore" class="w-100 acc-border rounded-2 text-center form-select">
                                                    <option value="" selected>-- Seleziona un'opzione --</option>
                                                    <option value="nogoal" class="text-bold bg-success text-light">NoGoal</option>
                                                    <option value="autogoal" class="text-bold bg-danger text-light">AutoGoal</option>
                                                    @foreach($home_team->team as $player)
                                                        <option value="{{ucfirst($player->name)}} {{ucfirst($player->surname)}}">{{ucfirst($player->name)}} {{ucfirst($player->surname)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="order-md-2 form-label d-flex justify-content-center align-items-center col-12 col-md-2 px-0 mt-3" for="awayScore">
                                                Gol {{$game->away_team}}
                                            </label>
                                            <div class="oreder-md-1 col-12 col-md-4 px-md-2 px-0 d-flex justify-content-center align-items-center position-relative" id="awayScoreContainer">
                                                <select name="awayScore" id="awayScore" class="w-100 acc-border rounded-2 text-center form-select">
                                                    <option value="" selected>-- Seleziona un'opzione --</option>
                                                    <option value="NoGol" class="text-bold bg-success text-light">NoGol</option>
                                                    <option value="AutoGol" class="text-bold bg-danger text-light">AutoGol</option>
                                                    @foreach($away_team->team as $player)
                                                        <option value="{{ucfirst($player->name)}} {{ucfirst($player->surname)}}">{{ucfirst($player->name)}} {{ucfirst($player->surname)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('homeScore')
                                                <span class="text-danger d-flex justify-content-start align-items-center" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @error('awayScore')
                                                <span class="text-danger d-flex justify-content-start align-items-center" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-12 justify-content-around d-flex align-items-center">
                                                <button type="submit" class="btn btn-success text-light">Pronostica</button>
                                                <button type="reset" class="btn btn-primary text-light">Resetta</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            @endif
        @endif
    </div>

</x-layout>