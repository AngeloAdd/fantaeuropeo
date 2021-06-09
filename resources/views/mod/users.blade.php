<x-layout>
        <div class="container">

            
            @if(Auth::user()->users_mod)
                <div class="row">
                    <div class="col-12">
                        <h2>Gestione Utenti</h2>

                        <div class="container-fluid p-5">
                            <ul class="list-group list-group-horizontal row">
                                <li class="list-group-item col-2 overflow-auto title-font text-bold">Nome Giocatore</li>
                                <li class="list-group-item col-1 overflow-auto title-font text-bold">Gestisci</li>
                            </ul>
                            @foreach($users as $user)
                                <ul class="list-group list-group-horizontal row">
                                    <li class="list-group-item col-2 overflow-auto title-font text-bold">{{$user->name}}</li>
                                    <li class="list-group-item col-1 overflow-auto title-font text-bold">
                                        <a href="{{route('mod.userShow', compact('user'))}}" class="btn btn-danger">Vai</a>
                                    </li>
                                </ul>
                            @endforeach
                            <ul class="list-group list-group-horizontal row">
                                <li class="list-group-item col-2 overflow-auto title-font text-bold">Nuovo Utente</li>
                                <li class="list-group-item col-1 overflow-auto title-font text-bold">
                                    <a href="{{route('mod.userCreate')}}" class="btn btn-warning">Crea</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            @endif

        </div>
</x-layout>