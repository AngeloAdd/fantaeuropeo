<x-layout>
        <div class="container">
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
                <div class="row">
                    <div class="col-12">
                        <h2>Abilità Moderatori</h2>
                        <a href="" class="btn btn-danger">Vai Moderare</a>
                    </div>
                </div>
            @endif
            @if(Auth::user()->games_mod)
                <div class="row">
                    <div class="col-12">
                        <h2>Gestione Partite</h2>
                        <a href="" class="btn btn-danger">Inserisci Risultati</a>
                    </div>
                </div>
            @endif
            @if(Auth::user()->users_mod)
                <div class="row">
                    <div class="col-12">
                        <h2>Gestione Utenti</h2>
                        <a href="{{route('mod.users')}}" class="btn btn-danger">Vai a Gestire</a>
                    </div>
                </div>
            @endif

        </div>
</x-layout>