<x-layout>

    <div class="container">
        <div class="row justify-content-center my-2 border border-1 border-success">
            <div class="col-2">#</div>
            <div class="col-2">Partecipante</div>
            <div class="col-2">Classifica</div>
            <div class="col-2">Risultati Esatti</div>
            <div class="col-2">Segni</div>
            <div class="col-2">Marcatori</div>
        </div>
        
        @foreach($officialStanding as $position => $player)
        <div class="row justify-content-center my-2 border border-1 border-success">
            <div class="col-2">{{$position + 1}}</div>
            <div class="col-2">{{$player['user']->name}}</div>
            <div class="col-2">{{$player['total']}}</div>
            <div class="col-2">{{$player['results']}}</div>
            <div class="col-2">{{$player['signs']}}</div>
            <div class="col-2">{{$player['scorers']}}</div>
        </div>
        @endforeach

    </div>

</x-layout>