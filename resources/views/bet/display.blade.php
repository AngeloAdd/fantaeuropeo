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

        <h2 class="text-center w-100">Questi sono i risultati pronosticati per la partita {{$game->home_team}} vs {{$game->away_team}}</h2>

        <div class="row justify-content-center">
            <div class="col-12 col-md-9 offset-md-3 col-xl-10 offset-xl-2">
                <div class="container-fluid px-0 pe-md-4">
                    <ul class="list-group list-group-horizontal row @if($game->id < 36) justify-content-center @endif">
                        <li class="list-group-item col-5 col-sm-2 title-font text-bold">Nome Giocatore</li>
                        <li class="list-group-item d-none d-sm-inline d-lg-none @if($game->id < 36) col-2 @else col-1 @endif  title-font text-bold">1 X 2</li>
                        <li class="list-group-item d-none d-lg-inline @if($game->id < 36) col-2 @else col-1 @endif  title-font text-bold">Segno</li>
                        <li class="list-group-item d-none d-sm-inline @if($game->id < 36) col-3 @else col-2 @endif title-font text-bold">Risultato {{$game->home_team}} vs {{$game->away_team}} </li>
                        <li class="list-group-item col-2 d-sm-none fs-4">
                            <i class="bi bi-bar-chart-fill text-dark"></i>
                        </li>
                        @if($game->id > 36)
                            <li class="list-group-item col-2 d-none d-sm-inline title-font text-bold">Gol/Nogol {{$game->home_team}}</li>
                            <li class="list-group-item col-2 d-none d-sm-inline title-font text-bold">Gol/Nogol {{$game->away_team}}</li>
                        @endif
                        <li class="list-group-item col-5 col-sm-3 title-font text-bold">Ultimo Update</li>
                    </ul>
                    @foreach($sortedBets as $key => $bet)
                        <ul class="list-group list-group-horizontal row @if($game->id < 36) justify-content-center my-1 @endif">
                            <li class="list-group-item col-5 col-sm-2 @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif ">{{$bet->user->name}}</li>
                            <li class="list-group-item d-none d-sm-inline @if($game->id < 36) col-2 fs-3 @else col-1 @endif @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif ">{{$bet->sign}}</li>
                            <li class="list-group-item d-none d-sm-inline @if($game->id < 36) col-3 fs-3 @else col-2 @endif @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif ">{{$bet->home_result}} a {{$bet->away_result}}</li>
                            <li class="list-group-item col-2 d-sm-none @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif ">{{$bet->sign}} ({{$bet->home_result}}-{{$bet->away_result}})</li>
                            
                            @if($game->id > 36)
                            <li class="list-group-item d-none d-sm-inline col-2 @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif ">{{$bet->home_score}}</li>
                            <li class="list-group-item d-none d-sm-inline col-2 @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif ">{{$bet->home_score}}</li>
                            @endif
                            <li class="list-group-item col-5 col-sm-3 @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif " title="ore {{(new Carbon\Carbon($bet->updated_at))->format('H:i:s')}} e {{(new Carbon\Carbon($bet->updated_at))->format('u')}} millisecondi">
                                {{(new Carbon\Carbon($bet->updated_at))->format('d/m/Y - H:i:s')}}
                            </li>
                        </ul>
                        @if($game->id > 36)
                        <div class="row justify-content-center mb-2">

                            <div class="col-3 m-0 d-sm-none title-font @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif border border-end-0 border-1 border-info">Gol NoGol</div>
                            <div class="col-7 m-0 d-sm-none @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif border border-1 border-info">
                                {{$bet->home_score}} - {{$bet->away_score}}
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

    
</x-layout>