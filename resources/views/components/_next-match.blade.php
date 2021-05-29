<div class="card w-100 h-100 text-dark shadow">
    <div class="card-header bg-info text-light">Prossimo Incontro</div>
    <div class="card-body d-flex justify-content-center align-items-center py-0">
        <div class="container py-0">
            <div class="row p-0">
                <div class="col-4 d-flex flex-column jsutify-content-center align-items-center py-3">
                    <p class="title-font fs-4 text-dark text-bold m-1">{{$nextGameInfo['home_team']->national_team}}</p>
                    <img src="{{Storage::url($nextGameInfo['home_team']->flag)}}" width="120" height="80" alt="$nextGameInfo['home_team']->national_team-Flag">
                </div>
                <div class="col-4 d-flex flex-column jsutify-content-center align-items-center my-auto pt-5 pb-2">
                    <p class="m-1">
                        {{(new Carbon\Carbon($nextGameInfo['next_game']->game_date))->format('d ')}}
                        {{ucfirst((new Carbon\Carbon($nextGameInfo['next_game']->game_date))->monthName)}}
                        {{(new Carbon\Carbon($nextGameInfo['next_game']->game_date))->format(' Y')}}
                    </p>
                    <p class="m-1">ore {{(new Carbon\Carbon($nextGameInfo['next_game']->game_date))->format('H:i')}}</p>
                    <p class="m-1 text-info"><small>Incontro n°{{$nextGameInfo['next_game']->id}}</small></p>
                </div>
                <div class="col-4 d-flex flex-column jsutify-content-center align-items-center py-3">
                    <p class="title-font fs-4 text-dark text-bold m-1">{{$nextGameInfo['away_team']->national_team}}</p>
                    <img src="{{Storage::url($nextGameInfo['away_team']->flag)}}" width="120" height="80" alt="{{$nextGameInfo['away_team']->national_team}}-Flag">
                </div>
                <div class="col-12 d-flex justify-content-center py-3">
                    <a href="" role="button" class="btn btn-info text-light">Inserisci Pronostico</a>
                </div>
            </div>
        </div>
    </div>
</div>