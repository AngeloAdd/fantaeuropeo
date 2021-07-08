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
                    <h5 class="card-title">Vincitore e Capocannoniere</h5>
                    <form action="{{route('mod.updateWinner', compact('champion'))}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="justify-content-center align-items-center flex-column container-fluid px-1">
                            
                            <div class="mb-3 row justify-content-center align-items-center border border-info border-1 pb-4 px-2 rounded-2 shadow">
                                <label for="homeTeam" class="col-12 form-label text-dark d-flex align-items-center justify-content-center">
                                    <p class="m-0 text-center">
                                        Vincitrice Europeo 2020
                                    </p>
                                </label>
                                <div class="col-12 col-md-4 px-0">
                                    <input type="text" value="{{$champion->champion_team ?? ''}}" name="champion_team" class="result-input form-control text-dark @error('champion_team') px-3 is-invalid @enderror" id="homeTeam">
                                </div>
                                </div>
                            </div>

                            <div class="mb-3 row justify-content-center align-items-center border border-info border-1 pb-4 px-2 rounded-2 shadow">
                                <label for="numberOfTopScorer" class="col-12 px-0 form-label text-dark d-flex align-items-center justify-content-center">
                                    <p class="m-0 text-center">
                                        Numero di Capocannonieri
                                    </p>
                                </label>
                                <div class="col-12 col-md-2 px-md-2 px-0">
                                    <input type="number" min="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="number_of_scorers" class="result-input form-control text-dark @error('home_result') px-3 is-invalid @enderror" id="numberOfTopScorer">
                                </div>
                                
                                @error('away_result')
                                    <span class="text-danger d-flex justify-content-start align-items-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                            <div class="mb-3 px-2 row justify-content-center align-items-center border border-1 border-info rounded-2 shadow pb-3">
                                <div class="text-dark w-100 text-center col-12 my-3">Input Capocannoniere/i @error('sign')<span class="text-danger text-bold fs-5">*</span>@enderror </div>
                                <ul class="list-unstyled col-12" id="topScorer"></ul>
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
        let numberOfTopScorer = document.getElementById('numberOfTopScorer')
        let topScorer = document.getElementById('topScorer')

        function selectTopScorer() {
            topScorer.innerHTML = ""
            
            let topScorerPlayer = numberOfTopScorer.value
            
            let i = 1
                while(i<=topScorerPlayer){
                
                li=document.createElement('li')
                li.classList.add('d-flex', 'flex-column','justify-content-center','align-items-center','pt-2')

                li.innerHTML = 
                    `
                    <label class="form-label px-0 d-flex justify-content-center align-items-center" for="topScorerPlayer${i}">
                        Capocannoniere ${i}
                    </label>
                    <div class="px-md-2 px-0 d-flex justify-content-center align-items-center position-relative" id="topScorerPlayer${i}Container">
                        <input type="text" value="{{$champion->top_scorer ?? ''}}" name="top_scorer${i}" class="result-input form-control text-dark @error('top_scorer') px-3 is-invalid @enderror" id="topScorerPlayer${i}">
                    </div>
                    @error('topScorerPlayer')
                        <span class="text-danger d-flex justify-content-start align-items-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    `;    
                i++
                topScorer.appendChild(li)
            }
        }

        numberOfTopScorer.addEventListener('input', selectTopScorer)

    </script>
@endpush

</x-layout>