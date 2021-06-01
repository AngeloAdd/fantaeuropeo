<x-layout>
    <x-slot name="style">
        <style>
            /* Chrome, Safari, Edge, Opera */
            .result-input::-webkit-outer-spin-button,
            .result-input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }

            /* Firefox */
            .result-input[type=number] {
            -moz-appearance: textfield;
            }

            .drop-own-position {
                top: 2.9em;
            }

            .player-selection:hover{
                background-color: #A9B2BA;
            }
            
        </style>
    </x-slot>

    <x-_game_bar :nextGame="$next_game" :games="$games" :game="$game"/>

    <div class="container justify-content-center">
        <div class="row justify-content-center">
            <div class="col-6">
                @if(session('message'))
                    <div class="alert alert-dark text-center text-dark">
                        {{$message}}
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
            
            <div class="col-10">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="container-fluid justify-content-center align-items-center py-3">
                            <div class="justify-content-center align-items-center row">
                                <div class="col-5 d-flex align-items-start flex-column jsutify-content-center">
                                    <h5 class="card-title text-dark display-6 title-font">Pronostico</h5>
                                    <h6 class="card-subtitle text-info">Inserisci il pronostico per l'Incontro n°{{$game->id}}</h6>
                                </div>
                                <img src="{{Storage::url($home_team->flag)}}" class="col-2" width="120px" height="80" alt="">
                                <p class="col-1 d-flex justify-content-center align-items-center display-6 title-font">vs</p>
                                <img src="{{Storage::url($away_team->flag)}}" class="col-2" width="120" height="80" alt="">
                            </div>
                        </div>
                        <form action="{{route('bet.store', compact('game'))}}" method="POST">
                            @csrf
                            <div class="justify-content-center align-items-center flex-column container-fluid">

                                <div class="mb-3 row justify-content-center align-items-center border border-info border-1 pb-3 rounded-2 shadow">
                                    <div class="text-dark w-100 text-center col-12 my-3">Inserisci il risultato esatto per {{$game->home_team}} vs {{$game->away_team}}.</div>
                                    <label for="resultHome" class="col-5 form-label text-dark d-flex align-items-center justify-content-center">
                                        Risultato Esatto Casa
                                        <span class="fs-5 title-font mx-3 d-flex align-items-start">
                                            {{$game->home_team}}
                                        </span>
                                    </label>
                                    <div class=" col-1">
                                        <input type="number" min="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="home_result" class="result-input form-control text-dark @error('home_result') px-3 is-invalid @enderror" id="resultHome">
                                    </div>
                                    <div class=" col-1">
                                        <input type="number" min="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="away_result" class="result-input form-control text-dark @error('away_result') px-3 is-invalid @enderror" id="resultAway">
                                    </div>
                                    <label for="resultAway" class="col-5 form-label text-dark d-flex align-items-center justify-content-center">
                                        <span class="fs-5 title-font mx-3 d-flex align-items-start">
                                                {{$game->away_team}}
                                        </span>
                                        Risultato Esatto Fuoricasa
                                    </label>
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

                                <div class="mb-3 row justify-content-center align-items-center text-dark border border-1 rounded-2 border-info pb-3 shadow">
                                    <div class="text-dark w-100 text-center col-12 my-3">Inserisci Segno 1X2 @error('sign')<span class="text-danger text-bold fs-5">*</span>@enderror </div>
                                    <div class="form-check col-4 d-flex justify-content-center align-items-center">
                                        <input class="form-check-input mx-2 mt-0" type="radio" name="sign" id="home_victory" value="1">
                                        <label class="form-check-label" for="home_victory">
                                            1: Vittoria {{$game->home_team}}
                                        </label>
                                    </div>
                                    <div class="form-check col-4 d-flex justify-content-center align-items-center">
                                        <input class="form-check-input mx-2 mt-0" type="radio" name="sign" value="X" id="draw">
                                        <label class="form-check-label" for="draw">
                                            X: Pareggio
                                        </label>
                                    </div>
                                    <div class="form-check col-4 d-flex justify-content-center align-items-center">
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
                                <div class="mb-3 row justify-content-center align-items-center border border-1 border-info rounded-2 shadow pb-3">
                                    <div class="text-dark w-100 text-center col-12 my-3">Inserisci Pronostico Gol/NoGol (Uno per squadra) @error('sign')<span class="text-danger text-bold fs-5">*</span>@enderror </div>
                                    <label class="form-label col-3 d-flex justify-content-center align-items-center" for="homeScore">
                                        Gol {{$game->home_team}}
                                    </label>
                                    <div class="col-3 d-flex justify-content-center align-items-center position-relative" id="homeScoreContainer">
                                        <select name="homeScore" id="homeScore" class="w-100 acc-border rounded-2 text-center form-select">
                                            <option value="" selected>--Seleziona un'opzione--</option>
                                            <option value="nogoal" class="text-bold bg-success text-white">NoGoal</option>
                                            <option value="autogoal" class="text-bold bg-danger text-white">AutoGoal</option>
                                            @foreach($home_team->team as $player)
                                                <option value="{{lcfirst($player->name)}}_{{lcfirst($player->surname)}}">{{ucfirst($player->name)}} {{ucfirst($player->surname)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 d-flex justify-content-center align-items-center position-relative" id="awayScoreContainer">
                                        <select name="awayScore" id="awayScore" class="w-100 acc-border rounded-2 text-center form-select">
                                            <option value="" selected>--Seleziona un'opzione--</option>
                                            <option value="nogoal" class="text-bold bg-success text-white">NoGoal</option>
                                            <option value="autogoal" class="text-bold bg-danger text-white">AutoGoal</option>
                                            @foreach($away_team->team as $player)
                                                <option value="{{lcfirst($player->name)}}_{{lcfirst($player->surname)}}">{{ucfirst($player->name)}} {{ucfirst($player->surname)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="form-label d-flex justify-content-center align-items-center col-3" for="awayScore">
                                        Gol {{$game->away_team}}
                                    </label>
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
                                <div class="row w-50 mx-auto">
                                    <div class="col-12 d-flex justify-content-around align-items-center">
                                        <button type="submit" class="btn btn-primary">Inserisci Pronostico</button>
                                        <button type="reset" class="btn btn-info">Resetta Modulo</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

</x-layout>