<x-layout>
    <div class="container-fluid">
        <ul class="list-group list-group-horizontal row">
            <li class="list-group-item col-1 px-1">Incontro n°</li>
            <li class="list-group-item col-2 px-1">Partita</li>
            <li class="list-group-item col-2 px-1">Risultato</li>
            <li class="list-group-item col-1 px-1">segno</li>
            <li class="list-group-item col-4 px-1">Cartellino</li>
            <li class="list-group-item col-2 px-1">Modifica</li>
        </ul>
        @foreach($games as $key=>$game)
            <ul class="list-group list-group-horizontal row">
                <li class="list-group-item col-1 px-1 title-font">
                    @if($game->final)
                        FINALE
                    @else                   
                        {{$key+1}}
                    @endif
                </li>
                <li class="list-group-item col-2 px-1">{{$game->home_team}} vs {{$game->away_team}}</li>
                <li class="list-group-item col-2 px-1">{{$game->home_result ?? 'N/A'}} - {{$game->away_result ?? 'N/A'}}</li>
                <li class="list-group-item col-1 px-1">{{$game->sign ?? 'N/A'}}</li>
                @if(isset($game->home_score) && gettype($game->home_score) === 'array')
                    <li class="list-group-item col-2 px-1">
                        @foreach($game->home_score as $key=>$home_scorer)
                            <p>{{$key+1}}. {{$home_scorer}}</p>
                        @endforeach
                    </li>
                @elseif(isset($game->home_score) && gettype($game->home_score) === 'string')
                    <li class="list-group-item col-2 px-1">{{$game->home_score}}</li>
                @else
                    <li class="list-group-item col-2 px-1">N/A</li>
                @endif
                @if(isset($game->away_score) && gettype($game->away_score) === 'array')
                    <li class="list-group-item col-2 px-1">
                        @foreach($game->away_score as $key=>$away_scorer)
                            <p class="mb-0">{{$key+1}}. {{$away_scorer}}</p>
                        @endforeach
                    </li>
                @elseif(isset($game->away_score) && gettype($game->away_score) === 'string')
                    <li class="list-group-item col-2 px-1">{{$game->away_score}}</li>
                @else
                    <li class="list-group-item col-2 px-1">N/A</li>
                @endif
                <li class="list-group-item col-2 px-1">
                    <a href="{{route('mod.gameEdit', compact('game'))}}" class="btn btn-danger text-light">Inserisci</a>
                </li>
            </ul>
        @endforeach
    </div>

</x-layout>