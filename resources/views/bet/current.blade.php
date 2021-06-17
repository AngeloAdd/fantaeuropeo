<x-layout>

    <div class="container-fluid justify-content-center py-4 container-homepage-customr">
        <div class="row justify-content-center">
            <div class="col-8 offset-2">
                @if(session('message'))
                    <div class="alert alert-dark text-center text-dark">
                        {{session('message')}}
                    </div>
                @endif
            </div>
        </div>
    <x-_game_bar :nextGame="$next_game" :games="$games" :game="$game"/>


    <h2 class="text-center w-100">Hai già un pronostico all'attivo eccolo qui. Se vuoi puoi modificarlo:</h2>
    <div class="row justify-content-center">
        <div class="col-12 col-md-9 offset-md-3 col-xl-10 offset-xl-2">
            <div class="container-fluid px-0 pe-md-4">
                <ul class="list-group list-group-horizontal row @if($game->id < 36) justify-content-center @endif">
                    <li class="list-group-item col-6 col-sm-2 title-font text-bold">Nome Giocatore</li>
                    <li class="list-group-item d-none d-sm-inline d-lg-none @if($game->id < 36) col-2 @else col-1 @endif  title-font text-bold">1 X 2</li>
                    <li class="list-group-item d-none d-lg-inline @if($game->id < 36) col-2 @else col-1 @endif  title-font text-bold">Segno</li>
                    <li class="list-group-item d-none d-sm-inline @if($game->id < 36) col-3 @else col-2 @endif title-font text-bold">Risultato {{$game->home_team}} vs {{$game->away_team}} </li>
                    
                    @if($game->id > 36)
                    <li class="list-group-item col-2 d-none d-sm-inline title-font text-bold">Gol/Nogol {{$game->home_team}}</li>
                    <li class="list-group-item col-2 d-none d-sm-inline title-font text-bold">Gol/Nogol {{$game->away_team}}</li>
                    @endif
                    <li class="list-group-item col-6 col-sm-3 title-font text-bold">Ultimo Update</li>

                </ul>
                                                
                <ul class="list-group list-group-horizontal row @if($game->id < 36) justify-content-center @endif my-1">
                    <li class="list-group-item col-6 col-sm-2 bg-primary border-info text-light">{{$userBet->user->name}}</li>
                    <li class="list-group-item d-none d-sm-inline @if($game->id < 36) col-2 fs-3 @else col-1 @endif  bg-primary border-info text-light">{{$userBet->sign}}</li>
                    <li class="list-group-item d-none d-sm-inline @if($game->id < 36) col-3 fs-3 @else col-2 @endif bg-primary border-info text-light">{{$userBet->home_result}} a {{$userBet->away_result}}</li>
                    
                    @if($game->id > 36)
                        <li class="list-group-item d-none d-sm-inline col-2 bg-primary border-info text-light">{{$userBet->home_score}}</li>
                        <li class="list-group-item d-none d-sm-inline col-2 bg-primary border-info text-light">{{$userBet->home_score}}</li>
                    @endif
                    <li class="list-group-item col-6 col-sm-3 bg-primary border-info text-light" title="ore {{(new Carbon\Carbon($userBet->updated_at))->format('H:i:s')}} e {{(new Carbon\Carbon($userBet->updated_at))->format('u')}} millisecondi">
                        {{(new Carbon\Carbon($userBet->updated_at))->format('d/m/Y - H:i:s')}}
                    </li>
                </ul>
                <div class="row d-sm-none justify-content-around bg-primary rounded-2 py-2 text-dark">
                    <div class="col-5 bg-light text-center my-1 p-2 rounded-2">Segno</div>
                    <div class="col-5 bg-light my-1 p-2 rounded-2 fs-3 d-flex align-items-center justify-content-center">{{$userBet->sign}}</div>
                    <div class="col-5 bg-light text-center my-1 p-2 rounded-2">Risultato {{$game->home_team}}</div>
                    <div class="col-5 bg-light my-1 p-2 rounded-2 fs-3 d-flex align-items-center justify-content-center">{{$userBet->home_result}}</div>
                    <div class="col-5 bg-light text-center my-1 p-2 rounded-2">Risultato {{$game->away_team}}</div>
                    <div class="col-5 bg-light my-1 p-2 rounded-2 fs-3 d-flex align-items-center justify-content-center">{{$userBet->away_result}}</div>
                    
                    @if($game->id > 36)
                        <div class="col-5 bg-light text-center my-1 p-2 rounded-2">Gol/Nogol {{$game->home_team}}</div>
                        <div class="col-5 bg-light my-1 p-2 rounded-2 fs-5 d-flex text-center align-items-center">{{$userBet->home_score}}</div>
                        <div class="col-5 bg-light text-center my-1 p-2 rounded-2">Gol/Nogol {{$game->away_team}}</div>
                        <div class="col-5 bg-light my-1 p-2 rounded-2 fs-5 d-flex align-items-center text-center">{{$userBet->home_score}}</div>
                    @endif
                </div>
                <div class="row justify-content-center">
                    <div class="col-6 d-flex justify-content-center my-4">
                        <a href="{{route('bet.edit', ['bet'=> $userBet])}}" class="btn btn-danger text-light">Modifica Pronostico</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>