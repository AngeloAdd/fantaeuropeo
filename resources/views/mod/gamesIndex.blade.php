<x-layout>
    <div class="container-fluid px-0">
        <div class="row px-0">
            <div class="col-12 col-md-9 offset-md-3 col-xl-10 offset-xl-2">
                <div class="container-fluid">
                    <ul class="list-group list-group-horizontal row">
                        <li class="list-group-item col-1 d-none d-sm-flex px-0 px-sm-1">Incontro n°</li>
                        <li class="list-group-item col-4 col-sm-2 px-0 px-sm-1">Partita</li>
                        <li class="list-group-item col-3 col-sm-2 px-0 px-sm-1">Risultato</li>
                        <li class="list-group-item col-2 col-sm-1 px-0 px-sm-1">segno</li>
                        <li class="list-group-item col-4 d-none d-sm-flex px-0 px-sm-1">Cartellino</li>
                        <li class="list-group-item col-3 col-sm-2 px-0 px-sm-1">Modifica</li>
                    </ul>
                    @foreach($games as $key=>$game)
                        <ul class="list-group list-group-horizontal row">
                            <li class="list-group-item col-1 px-0 px-sm-1 title-font d-none d-sm-flex">
                                @if($game->final)
                                    FINALE
                                @else                   
                                    {{$key+1}}
                                @endif
                            </li>
                            <li class="list-group-item col-4 col-sm-2 px-0 px-sm-1">{{$game->home_team}} vs {{$game->away_team}}</li>
                            <li class="list-group-item col-3 col-sm-2 px-0 px-sm-1">{{$game->home_result ?? 'N/A'}} - {{$game->away_result ?? 'N/A'}}</li>
                            <li class="list-group-item col-2 col-sm-1 px-0 px-sm-1">{{$game->sign ?? 'N/A'}}</li>
                            @if(isset($game->home_score) && gettype($game->home_score) === 'array')
                                <li class="list-group-item col-2 px-0 px-sm-1 d-none d-sm-flex">
                                    @foreach($game->home_score as $key=>$home_scorer)
                                        <p>{{$key+1}}. {{$home_scorer}}</p>
                                    @endforeach
                                </li>
                            @elseif(isset($game->home_score) && gettype($game->home_score) === 'string')
                                <li class="list-group-item col-2 px-0 px-sm-1 d-none d-sm-flex">{{$game->home_score}}</li>
                            @else
                                <li class="list-group-item col-2 px-0 px-sm-1 d-none d-sm-flex">N/A</li>
                            @endif
                            @if(isset($game->away_score) && gettype($game->away_score) === 'array')
                                <li class="list-group-item col-2 px-0 px-sm-1 d-none d-sm-flex">
                                    @foreach($game->away_score as $key=>$away_scorer)
                                        @if($away_scorer === "Autogol")
                                            <p class="mb-0">{{$key+1}}. AutoGol</p>
                                        @else
                                            <p class="mb-0">{{$key+1}}. {{$away_scorer}}</p>
                                        @endif
                                    @endforeach
                                </li>
                            @elseif(isset($game->away_score) && gettype($game->away_score) === 'string')
                                <li class="list-group-item col-2 px-0 px-sm-1 d-none d-sm-flex">{{$game->away_score}}</li>
                            @else
                                <li class="list-group-item col-2 px-0 px-sm-1 d-none d-sm-flex">N/A</li>
                            @endif
                            <li class="list-group-item col-3 col-sm-2 px-0 px-sm-1">
                                <a href="{{route('mod.gameEdit', compact('game'))}}" class="btn btn-danger text-light">
                                    <i class="bi bi-brush fs-4"></i>
                                </a>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>