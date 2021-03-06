<x-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="offset-2 col-8">
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
                    <form action="{{route('mod.gameUpdate', compact('game'))}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="justify-content-center align-items-center flex-column container-fluid px-1">
                            @if($game->id > 36)
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
                            @endif
                            <div class="mb-3 row justify-content-center align-items-center border border-info border-1 pb-4 px-2 rounded-2 shadow">
                                <div class="text-dark w-100 text-center col-12 my-3 px-0">Inserisci il risultato esatto per {{$game->home_team ?? ''}} vs {{$game->away_team ?? ''}}.</div>
                                <label for="resultHome" class="col-12 order-md-1 px-0 col-md-4 form-label text-dark d-flex align-items-center justify-content-center">
                                    <p class="m-0 text-center">
                                        Gol Casa
                                    </p>
                                    <span class="fs-5 title-font mx-3 d-flex align-items-start">
                                        {{$game->home_team ?? ''}}
                                    </span>
                                </label>
                                <div class="col-12 order-md-2 col-md-2 px-md-2 px-0">
                                    <input type="number" min="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="home_result" class="result-input form-control text-dark @error('home_result') px-3 is-invalid @enderror" id="resultHome">
                                </div>
                                <label for="resultAway" class="col-12 order-md-4 col-md-4 mt-3 mt-md-0 px-0 form-label text-dark d-flex align-items-center justify-content-center">
                                    <p class="m-0 order-md-2 text-center">
                                        Gol Ospite
                                    </p>
                                    <span class="order-md-1 fs-5 title-font mx-3 d-flex align-items-start">
                                        {{$game->away_team ?? ''}}
                                    </span>
                                </label>
                                <div class="col-12 col-md-2 px-md-2 px-0 order-md-3">
                                    <input type="number" min="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="away_result" class="result-input form-control text-dark @error('away_result') px-3 is-invalid @enderror" id="resultAway">
                                </div>
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

                            <div class="mb-3 row justify-content-center align-items-center flex-column flex-md-row text-dark border border-1 rounded-2 border-info pb-3 shadow">
                                <div class="text-dark w-100 text-center col-12 my-3">Inserisci Segno 1X2 @error('sign')<span class="text-danger text-bold fs-5">*</span>@enderror </div>
                                <div class="form-check col-12 col-md-4 d-flex justify-content-start justify-content-md-center align-items-center">
                                    <input @if($game->sign === '1') checked @endif class="form-check-input mx-2 mt-0" type="radio" name="sign" id="home_victory" value="1">
                                    <label class="form-check-label" for="home_victory">
                                        1: Vittoria {{$game->home_team ?? ''}}
                                    </label>
                                </div>
                                <div class="form-check col-12 col-md-4 d-flex justify-content-start justify-content-md-center align-items-center">
                                    <input @if($game->sign === 'X') checked @endif class="form-check-input mx-2 mt-0" type="radio" name="sign" value="X" id="draw">
                                    <label class="form-check-label" for="draw">
                                        X: Pareggio
                                    </label>
                                </div>
                                <div class="form-check col-12 col-md-4 d-flex justify-content-start justify-content-md-center align-items-center">
                                    <input @if($game->sign === '2') checked @endif class="form-check-input mx-2 mt-0" type="radio" name="sign" id="away_victory" value="2">
                                    <label class="form-check-label" for="away_victory">
                                        2: Vittoria {{$game->away_team ?? ''}}
                                    </label>
                                </div>
                                @error('sign')
                                    <span class="text-danger d-flex justify-content-start align-items-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 px-2 row justify-content-center align-items-center border border-1 border-info rounded-2 shadow pb-3">
                                <div class="text-dark w-100 text-center col-12 my-3">Inserisci i Gol fatti @error('sign')<span class="text-danger text-bold fs-5">*</span>@enderror </div>
                                <ul class="list-unstyled col-12 col-md-6" id="homeWrapper"></ul>
                                <hr class="d-block d-md-none">
                                <ul class="list-unstyled col-12 col-md-6" id="awayWrapper"></ul>
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

@push('scripts')
    <script>
        let homeGol = document.getElementById('resultHome')
        let awayGol = document.getElementById('resultAway')
        let homeWrapper = document.getElementById('homeWrapper')
        let awayWrapper = document.getElementById('awayWrapper')



        function selectGolHome() {
            homeWrapper.innerHTML = ""
            
            let homeScore = homeGol.value
            
            let i = 1
            if(homeScore==='0'){
                li=document.createElement('li')
                li.classList.add('d-flex', 'flex-column','justify-content-center','align-items-center','pt-2')
                li.innerHTML = 
                    `
                    <label class="form-label px-0 d-flex justify-content-center align-items-center" for="homeScore">
                        Nessun Gol
                    </label>
                    <div class="px-md-2 px-0 d-flex justify-content-center align-items-center position-relative" id="homeScoreContainer">
                        <select name="homeScore" id="homeScore" class="w-100 acc-border rounded-2 text-center form-select">
                            <option value="NoGol" class="text-bold bg-success text-light">NoGoal</option>
                        </select>
                    </div>
                    @error('homeScore')
                        <span class="text-danger d-flex justify-content-start align-items-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    `;
                homeWrapper.appendChild(li)
            } else if(homeScore > 0) {

                while(i<=homeScore){
                
                li=document.createElement('li')
                li.classList.add('d-flex', 'flex-column','justify-content-center','align-items-center','pt-2')

                li.innerHTML = 
                    `
                    <label class="form-label px-0 d-flex justify-content-center align-items-center" for="homeScore${i}">
                        Scorer {{$game->home_team}} ${i}
                    </label>
                    <div class="px-md-2 px-0 d-flex justify-content-center align-items-center position-relative" id="homeScore${i}Container">
                        <select name="homeScore${i}" id="homeScore${i}" class="w-100 acc-border rounded-2 text-center form-select">
                            <option value="" selected>-- Seleziona un'opzione --</option>
                            <option value="AutoGol" class="text-bold bg-danger text-light">AutoGoal</option>
                            @foreach($home_team->team as $player)
                                <option value="{{ucfirst($player->name)}} {{ucfirst($player->surname)}}">{{ucfirst($player->name)}} {{ucfirst($player->surname)}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('homeScore')
                        <span class="text-danger d-flex justify-content-start align-items-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    `;    
                i++
                homeWrapper.appendChild(li)
                }
            }
        }

        homeGol.addEventListener('input', selectGolHome)
        function selectGolAway() {
            awayWrapper.innerHTML = ""
            
            let awayScore = awayGol.value
            
            let i = 1
            if(awayScore==='0'){
                li=document.createElement('li')
                li.classList.add('d-flex', 'flex-column','justify-content-center','align-items-center','pt-2')
                li.innerHTML = 
                    `
                    <label class="form-label px-0 d-flex justify-content-center align-items-center" for="awayScore">
                        Nessun Gol
                    </label>
                    <div class="px-md-2 px-0 d-flex justify-content-center align-items-center position-relative" id="awayScoreContainer">
                        <select name="awayScore" id="awayScore" class="w-100 acc-border rounded-2 text-center form-select">
                            <option value="NoGol" class="text-bold bg-success text-light">NoGoal</option>
                        </select>
                    </div>
                    @error('awayScore')
                        <span class="text-danger d-flex justify-content-start align-items-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    `;
                awayWrapper.appendChild(li)
            } else if(awayScore > 0) {

                while(i<=awayScore){
                
                li=document.createElement('li')
                li.classList.add('d-flex', 'flex-column','justify-content-center','align-items-center','pt-2')

                li.innerHTML = 
                    `
                    <label class="form-label px-0 d-flex justify-content-center align-items-center" for="awayScore${i}">
                        Scorer {{$game->away_team}} ${i}
                    </label>
                    <div class="px-md-2 px-0 d-flex justify-content-center align-items-center position-relative" id="awayScore${i}Container">
                        <select name="awayScore${i}" id="awayScore${i}" class="w-100 acc-border rounded-2 text-center form-select">
                            <option value="" selected>-- Seleziona un'opzione --</option>
                            <option value="AutoGol" class="text-bold bg-danger text-light">AutoGoal</option>
                            @foreach($away_team->team as $player)
                                <option value="{{ucfirst($player->name)}} {{ucfirst($player->surname)}}">{{ucfirst($player->name)}} {{ucfirst($player->surname)}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('awayScore')
                        <span class="text-danger d-flex justify-content-start align-items-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    `;    
                i++
                awayWrapper.appendChild(li)
                }
            }
        }

        awayGol.addEventListener('input', selectGolAway)
    </script>
@endpush

</x-layout>