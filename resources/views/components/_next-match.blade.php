<div class="card text-dark shadow">
    <div class="card-header shadow bg-success text-light mx-3 next-match-header-custom rounded-2 border-success">
        <div class="container-fluid px-0 py-0">
            <div class="row p-0 justify-content-around">
                <div class="col-5 col-md-4 order-md-1 d-flex flex-column jsutify-content-center align-items-center py-3">
                    <p class="title-font fs-4 m-1">{{$nextGameInfo['home_team']->national_team}}</p>
                    <img src="{{Storage::url($nextGameInfo['home_team']->flag)}}" class="img-fluid" width="120" height="80" alt="$nextGameInfo['home_team']->national_team-Flag">
                </div>
                <div class="col-2 d-flex align-items-center justify-content-center display-5 title-font py-3 mt-4 d-md-none">VS</div>
                <div class="col-5 col-md-4 order-md-3 d-flex flex-column jsutify-content-center align-items-center py-3">
                    <p class="title-font fs-4 m-1">{{$nextGameInfo['away_team']->national_team}}</p>
                    <img src="{{Storage::url($nextGameInfo['away_team']->flag)}}" class="img-fluid" width="120" height="80" alt="{{$nextGameInfo['away_team']->national_team}}-Flag">
                </div>
                <div class="col-12 w-100 text-light text-center my-3 fs-5">
                    Prossimo Incontro
                </div>
            </div>
        </div>
    </div>
    <div class="card-body container-fluid justify-content-center align-items-center pb-2 pt-0">
        <div class="row">
            <div class="col-6 d-flex flex-column jsutify-content-center align-items-start pe-0">
                <p class="m-1 text-primary fs-5">Incontro n°{{$nextGameInfo['next_game']->id}}</p>
                <p class="m-1 text-info">
                    {{(new Carbon\Carbon($nextGameInfo['next_game']->game_date))->format('d ')}}
                    {{ucfirst((new Carbon\Carbon($nextGameInfo['next_game']->game_date))->monthName)}}
                    {{(new Carbon\Carbon($nextGameInfo['next_game']->game_date))->format(' Y')}}
                </p>
                <p class="m-1 text-info">ore {{(new Carbon\Carbon($nextGameInfo['next_game']->game_date))->format('H:i')}}</p>
            
            </div>
            <div class="col-6 d-flex flex-column justify-content-center aling-items-center">
                <p class="text-dark title-font w-100 text-center">Pronostica</p>
                <a href="{{route('bet.nextGame')}}" role="button" class="btn w-50 mx-auto btn-outline-success">Vai</a>
            </div>
        </div>
    </div>
</div>
