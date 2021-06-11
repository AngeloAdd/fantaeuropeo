<x-layout>
        <div class="container-fluid mt-3">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8">
                    <div class="w-100 rounded-pill bg-light border border-1 border-danger text-danger shadow py-1 px-4">
                        <h2 class="my-1 text-center">Pannello Di Controllo {{Auth::user()->name ?? 'Guest'}}</h2>
                    </div>
                </div>
            </div>
            @if(session('message'))
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    </div>
                </div>
            @endif
            @if(Auth::user()->admin)
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-6 d-flex justify-content-center align-items-center flex-column mt-3">
                        <h2>Abilità Moderatori</h2>
                        <a href="" class="btn btn-warning text-light fs-5">Vai Moderare</a>
                    </div>
                </div>
            @endif
            @if(Auth::user()->games_mod)
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-6 d-flex justify-content-center align-items-center flex-column mt-3">
                        <h2>Gestione Partite</h2>
                        <a href="" class="btn btn-warning text-light fs-5">Inserisci Risultati</a>
                    </div>
                </div>
            @endif
            @if(Auth::user()->users_mod)
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-6 d-flex justify-content-center align-items-center flex-column mt-3">
                        <h2>Gestione Utenti</h2>
                        <a href="{{route('mod.users')}}" class="btn btn-warning text-light fs-5">Vai a Gestire</a>
                    </div>
                </div>
            @endif

        </div>
</x-layout>