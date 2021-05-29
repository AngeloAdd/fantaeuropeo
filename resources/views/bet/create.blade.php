<x-layout>

    <div class="container justify-content-center">
        <div class="row justify-content-center">
            <div class="col-6">
                @if(session('message'))
                    <div class="alert alert-dark text-center text-dark">
                        {{$message}}
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
            
            <div class="col-10">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="container-fluid justify-content-center align-items-center py-3">
                            <div class="justify-content-center align-items-center row">
                                <div class="col-5 d-flex align-items-start flex-column jsutify-content-center">
                                    <h5 class="card-title text-dark display-6 title-font">Pronostico</h5>
                                    <h6 class="card-subtitle text-info">Inserisci il pronostico per l'Incontro n°{{$nextGameInfo['next_game']->id}}</h6>
                                </div>
                                <img src="{{Storage::url($nextGameInfo['home_team']->flag)}}" class="col-2" width="120px" height="80" alt="">
                                <p class="col-1 d-flex justify-content-center align-items-center display-6 title-font">vs</p>
                                <img src="{{Storage::url($nextGameInfo['away_team']->flag)}}" class="col-2" width="120" height="80" alt="">
                            </div>
                        </div>
                        <form action="" method="POST">
                            @csrf
                            <div class="justify-content-center align-items-center flex-column container-fluid">

                                <div class="mb-3 row justify-content-center align-items-center border border-info border-1 pb-3 rounded-2 shadow">
                                    <div class="text-dark w-100 text-center col-12 my-3">Inserisci il risultato esatto per {{$nextGameInfo['home_team']->national_team}} vs {{$nextGameInfo['away_team']->national_team}}.</div>
                                    <label for="resultHome" class="col-5 form-label text-dark d-flex align-items-center justify-content-center">
                                        Risultato Esatto Casa
                                        <span class="fs-5 title-font mx-3 d-flex align-items-start">
                                            {{$nextGameInfo['home_team']->national_team}}
                                        </span>
                                    </label>
                                    <div class=" col-1 ">
                                        <input type="number" name="home_result" class="form-control text-dark" id="resultHome">
                                    </div>
                                    <div class=" col-1 ">
                                        <input type="number" name="away_result" class="form-control" id="resultAway">
                                    </div>
                                    <label for="resultAway" class="col-5 form-label text-dark d-flex align-items-center justify-content-center">
                                        <span class="fs-5 title-font mx-3 d-flex align-items-start">
                                                {{$nextGameInfo['away_team']->national_team}}
                                        </span>
                                        Risultato Esatto Fuoricasa
                                    </label>
                                </div>

                                <div class="mb-3 row justify-content-center align-items-center text-dark border border-1 rounded-2 border-info pb-3 shadow">
                                    <div class="text-dark w-100 text-center col-12 my-3">Inserisci Segno 1X2</div>
                                    <div class="form-check col-4 d-flex justify-content-center align-items-center">
                                        <input class="form-check-input mx-2" type="radio" name="sign" id="home_victory">
                                        <label class="form-check-label" for="home_victory">
                                            1: Vittoria {{$nextGameInfo['home_team']->national_team}}
                                        </label>
                                    </div>
                                    <div class="form-check col-4 d-flex justify-content-center align-items-center">
                                        <input class="form-check-input mx-2" type="radio" name="sign" id="draw">
                                        <label class="form-check-label" for="draw">
                                            X: Pareggio
                                        </label>
                                    </div>
                                    <div class="form-check col-4 d-flex justify-content-center align-items-center">
                                        <input class="form-check-input mx-2" type="radio" name="sign" id="away_victory">
                                        <label class="form-check-label" for="away_victory">
                                            2: Vittoria {{$nextGameInfo['away_team']->national_team}}
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3 row justify-content-center align-items-center border border-1 border-info rounded-2 shadow pb-3">
                                    <div class="text-dark w-100 text-center col-12 my-3">Inserisci Pronostico Gol (Uno per squadra)</div>
                                    <label class="form-label col-3 d-flex justify-content-center align-items-center" for="homeScore">
                                        Gol {{$nextGameInfo['home_team']->national_team}}
                                    </label>
                                    <div class="col-3 d-flex justify-content-center align-items-center">
                                        <input type="text" name="home_score" class="w-100 form-control" id="homeScore">
                                        <div id="dropDownHomeScore">
                                            <ul class="list-unstyled" id="homeScoreList">

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-3 d-flex justify-content-center align-items-center">
                                        <input type="text" name="away_score" class="w-100 form-control" id="awayScore">
                                    </div>
                                    <label class="form-label d-flex justify-content-center align-items-center col-3" for="awayScore">
                                        Gol {{$nextGameInfo['away_team']->national_team}}
                                    </label>
                                </div>
                                <div class="row w-50 mx-auto">
                                    <div class="col-12 d-flex justify-content-around align-items-center">
                                        <button type="submit" class="btn btn-primary">Inserisci Pronostico</button>
                                        <button type="reset" class="btn btn-info">Resetta Modulo</button>
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
            const awayTeamName = '{{$nextGameInfo['away_team']->national_team}}';
            const homeTeamName = '{{$nextGameInfo['home_team']->national_team}}';
            let homeScoreSearch = document.getElementById('homeScore');
            let dropDownHomeScore = document.getElementById('dropDownHomeScore')
            let homeScorelist = document.getElementById('homeScoreList');

            async function getData(url = '/squadre') {
                
                const response = await fetch(url, {
                    method: 'GET',
                    body: JSON.stringify()
                });
                return response.json();
                
            }

            getData()
            .then(data => {

                console.log(data)
                let homeTeam = data.filter( el => el.national_team === homeTeamName );
                let awayTeam = data.filter( el => el.national_team === awayTeamName );
                console.log(homeTeam)
                console.log(awayTeam)
                let players = flat.map(el => `${el.name.charAt(0).toUpperCase() + el.name.slice(1)} ${el.surname.charAt(0).toUpperCase()+ el.surname.slice(1)}`)

                
                search.addEventListener('keyup', (el) => {
                    let value = el.target.value.toLowerCase();
                    if(value === ""){
                        return list.innerHTML = "";
                    }
                    
                    let ricercaPerTeam = data.filter( el => {
                            return el.national_team.toLowerCase().match(value)
                        })
                    showTeams(ricercaPerTeam);
                    })
                    
                    /* search.addEventListener('keyup', (el) => {
                    let value = el.target.value.toLowerCase();
                    if(value === ""){
                        return list.innerHTML = "";
                    }
                    let ricercaPerGiocatore = players.filter( el => {
                            return el.toLowerCase().match(value)
                        })
                    showPlayers(ricercaPerGiocatore);
                    }) */


                    function showTeams (teams) {
                        list.innerHTML = "";
                        return teams.forEach( el => {
                            let li = document.createElement('li');
                            li.classList.add('m-3')
                            li.appendChild(document.createTextNode(el.national_team))
                            return list.appendChild(li)
                        });
                    }

                    /* function showPlayers (teams) {
                        list.innerHTML = "";
                        return teams.forEach( (el, i) => {
                            if(i<11){
                                let li = document.createElement('li');
                                li.classList.add('m-3')
                                li.appendChild(document.createTextNode(el))
                                return list.appendChild(li)
                            } else{
                                return;
                            }
                        });
                    } */
                    showTeams(data)

                    
                    


            })
        </script>

    @endpush

</x-layout>