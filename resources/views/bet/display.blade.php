<x-layout>

    <div class="container-fluid justify-content-center py-4 container-homepage-customr">
        <div class="row justify-content-center">
            <div class="col-8 offset-md-2">
                @if(session('message'))
                    <div class="alert alert-dark text-center text-dark">
                        {{session('message')}}
                    </div>
                @endif
            </div>
            <div class="col-8 offset-md-2">
                @if(session('error_message'))
                    <div class="alert alert-dark text-center text-dark">
                        {{session('error_message')}}
                    </div>
                @endif
            </div>
        </div>
        <x-_game_bar :nextGame="$next_game" :games="$games" :game="$game"/>
        <div class="@if(!$game->final) d-none @endif row justify-content-center mb-3">
            <div class="col-12 col-md-8 offset-md-3 offset-xl-2">
                <h2 class="title-font text-center display-1">FINALE</h2>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-12 col-md-8 offset-md-3 offset-xl-2">
                <div class="px-3 shadow bg-success text-light mx-3 rounded-2 border-success">
                    <div class="container-fluid px-0 py-0">
                        <div class="row p-0 justify-content-around">
                            <div class="col-12 w-100 text-light text-center my-3 fs-5">
                                Incontro N° {{$game->id}} Ore:
                                {{(new Carbon\Carbon($game->game_date))->format('H:i')}}
                                {{(new Carbon\Carbon($game->game_date))->format('d ')}}
                                {{ucfirst((new Carbon\Carbon($game->game_date))->monthName)}}
                                {{(new Carbon\Carbon($game->game_date))->format(' Y')}}
                            </div>
                            <div class="col-5 col-md-3 order-md-1 d-flex flex-column jsutify-content-center align-items-center py-3">
                                <p class="title-font fs-4 m-1">{{$game->home_team}}</p>
                                <img src="{{Storage::url($home_team->flag)}}" class="img-fluid" width="120" height="80" alt="">
                            </div>
                            <div class="col-2 d-flex align-items-center justify-content-center display-5 title-font py-3 mt-4 d-md-none">VS</div>
                            <div class="col-5 col-md-3 order-md-3 d-flex flex-column jsutify-content-center align-items-center py-3">
                                <p class="title-font fs-4 m-1">{{$game->away_team}}</p>
                                <img src="{{Storage::url($away_team->flag)}}" class="img-fluid" width="120" height="80" alt="">
                            </div>
                            <p class="col-12 col-md-6 order-md-2 d-flex align-items-center justify-content-center display-5 title-font py-3" id="countDown" data-date="{{(new Carbon\Carbon($game->game_date))->format('Y-m-d H:i:s')}}"></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-12 col-md-9 offset-md-3 col-xl-10 offset-xl-2">
                <div class="container-fluid px-0 pe-md-4">
                    <ul class="list-group list-group-horizontal row @if($game->id <= 36) justify-content-center @endif">
                        <li class="list-group-item col-5 col-sm-2 title-font text-bold">Nome Giocatore</li>
                        <li class="list-group-item d-none d-sm-inline d-lg-none @if($game->id <= 36) col-2 @else col-1 @endif  title-font text-bold">1 X 2</li>
                        <li class="list-group-item d-none d-lg-inline @if($game->id <= 36) col-2 @else col-1 @endif  title-font text-bold">Segno</li>
                        <li class="list-group-item d-none d-sm-inline @if($game->id <= 36) col-3 @else col-2 @endif title-font text-bold">Risultato {{$game->home_team}} vs {{$game->away_team}} </li>
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
                        <ul class="list-group list-group-horizontal row @if($game->id <= 36) justify-content-center my-1 @endif">
                            <li class="list-group-item col-5 col-sm-2 @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif ">{{$bet->user->name}}</li>
                            <li class="list-group-item d-none d-sm-inline @if($game->id <= 36) col-2 fs-3 @else col-1 @endif @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif ">{{$bet->sign}}</li>
                            <li class="list-group-item d-none d-sm-inline @if($game->id <= 36) col-3 fs-3 @else col-2 @endif @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif ">{{$bet->home_result}} a {{$bet->away_result}}</li>
                            <li class="list-group-item col-2 d-sm-none @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif ">{{$bet->sign}} ({{$bet->home_result}}-{{$bet->away_result}})</li>
                            
                            @if($game->id > 36)
                            <li class="list-group-item d-none d-sm-inline col-2 @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif ">{{$bet->home_score}}</li>
                            <li class="list-group-item d-none d-sm-inline col-2 @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif ">{{$bet->away_score}}</li>
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