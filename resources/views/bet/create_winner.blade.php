<x-layout>

    <div class="container  vh-100">
        <div class="row">
            <div class="col-8 p-4 acc-border rounded-2">
                <form action="" method="POST">
                    @csrf

                    <div class="mb-3 row justify-content-center align-items-center pb-3">
                        <div class="w-100 text-center main-border rounded-2 p-2 text-light col-12 my-3">
                            Seleziona la Squadra che secondo te vincerà l'Europeo
                        </div>
                        <label class="form-label col-5 d-flex justify-content-center align-items-center" for="champion_team">
                            Elenco Squadre
                        </label>
                        <div class="col-5 d-flex justify-content-center align-items-center position-relative" id="homeScoreContainer">
                            <select name="champion_team" id="champion_team" class="w-100 acc-border rounded-2 text-center form-select">
                                <option value="" selected>--Seleziona un'opzione--</option>
                                
                                @foreach($teamsNames as $team)
                                    <option value="{{$team}}">{{$team}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row justify-content-center align-items-center pb-3">
                        <div class="w-100 text-center main-border rounded-2 p-2 text-light col-12 my-3">
                            Seleziona il giocatore che secondo te vincerà la classifica capocannonieri dell'Europeo
                        </div>
                        <label class="form-label col-5 d-flex justify-content-center align-items-center" for="team">
                            Seleziona una squadra
                        </label>
                        <div class="col-5 d-flex justify-content-center align-items-center position-relative">
                            <select id="team" class="w-100 acc-border rounded-2 text-center form-select">
                                <option value="" selected>--Seleziona un'opzione--</option>
                                @foreach($teamsNames as $team)
                                    <option value="{{$team}}">{{$team}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <label class="form-label col-5 d-flex justify-content-center align-items-center mt-1" for="teamMembers">
                            Seleziona un giocatore per <span class="title-font ms-1"> Squadra</span>
                        </label>
                        <div class="col-5 d-flex justify-content-center align-items-center position-relative">
                            <select id="teamMembers" class="w-100 acc-border rounded-2 text-center form-select  mt-1">
                                <option value="" selected>--Seleziona un'opzione--</option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Inserisci Pronostico</button>

                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            const teamSelection = document.getElementById('team');
            teamSelection.addEventListener('click', () => {
                return console.log(teamSelection.value);
            })
        </script>
    @endpush

</x-layout>