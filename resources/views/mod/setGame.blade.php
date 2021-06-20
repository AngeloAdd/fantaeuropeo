<x-layout>

<div class="container">
    <div class="row justify-content-center">
        <div class="offset-md-2 col-8">
            @if(session('message'))
                <div class="alert alert-success text-center">
                    {{session('message')}}
                </div>
            @endif
        </div>
    </div>
</div>
<div class="container-flui px-0">
    <div class="row px-0">
        <div class="col-12 col-md-9 offset-md-3 col-xl-10 offset-xl-2">
            <div class="card text-dark bg-light mb-3">
                <div class="card-header">Inserisci Informazioni</div>
                <div class="card-body">
                    <h5 class="card-title">{{$game->home_team ?? 'N/A'}} vs {{$game->away_team ?? 'N/A'}}</h5>
                    <form action="{{route('mod.setGame', compact('game'))}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="justify-content-center align-items-center flex-column container-fluid px-1">
                            <div class="mb-3 row justify-content-center align-items-center border border-info border-1 pb-4 px-2 rounded-2 shadow">
                                <div class="text-dark w-100 text-center col-12 my-3 px-0">Squadre</div>
                                    <label for="homeTeam" class="col-12 order-md-1 px-0 col-md-4 form-label text-dark d-flex align-items-center justify-content-center">
                                        <p class="m-0 text-center">
                                            Squadra Casa
                                        </p>
                                    </label>
                                    <div class="col-12 order-md-2 col-md-2 px-md-2 px-0">
                                        <input type="text" value="{{$game->home_team ?? ''}}" name="home_team" class="result-input form-control text-dark @error('home_team') px-3 is-invalid @enderror" id="homeTeam">
                                    </div>
                                    <label for="awayTeam" class="col-12 order-md-4 col-md-4 mt-3 mt-md-0 px-0 form-label text-dark d-flex align-items-center justify-content-center">
                                        <p class="m-0 order-md-2 text-center">
                                            Squadra Ospite
                                        </p>
                                    </label>
                                    <div class="col-12 col-md-2 px-md-2 px-0 order-md-3">
                                        <input type="text" value="{{$game->away_team ?? ''}}" name="away_team" class="result-input form-control text-dark @error('away_team') px-3 is-invalid @enderror" id="awayTeam">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 justify-content-around d-flex align-items-center">
                                    <button type="submit" class="btn btn-danger text-light">Inserisci Info</button>
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