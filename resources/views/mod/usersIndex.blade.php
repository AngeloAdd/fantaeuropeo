<x-layout>
        <div class="container-fluid mt-3">

            
            @if(Auth::user()->users_mod)
                <div class="row justify-content-center">
                    <div class="col-12 col-md-9 offset-md-3 col-xl-10 offset-xl-2">
                        <div class="w-100 rounded-pill bg-light border border-1 border-danger text-danger shadow py-1 px-4">
                            <h2 class="my-1 text-center">Pannello Di Controllo {{Auth::user()->name ?? 'Guest'}}</h2>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 offset-md-3 col-xl-10 offset-xl-2 mt-3">
                        <h2 class="my-1 text-center">Lista Utenti</h2>
                        <div class="container-fluid py-1 px-0">
                            <ul class="list-group list-group-horizontal row justify-content-center">
                                <li class="list-group-item px-0 px-md-3 col-2 title-font d-flex justify-content-center align-items-center">#</li>
                                <li class="list-group-item px-0 px-md-3 col-7 col-md-4 title-font d-flex justify-content-center align-items-center">Nome Giocatore</li>
                                <li class="list-group-item px-0 px-md-3 col-3 col-md-2 title-font d-flex justify-content-center align-items-center">Gestisci</li>
                            </ul>

                            @foreach($users as $key=>$user)
                                <ul class="list-group list-group-horizontal row justify-content-center">
                                    <li class="list-group-item px-0 px-md-3 col-2 title-font d-flex justify-content-center align-items-center fs-4">{{$key +1}}</li>
                                    <li class="list-group-item px-0 px-md-3 col-7 col-md-4 title-font d-flex justify-content-center align-items-center fs-4">{{$user->name}}</li>
                                    <li class="list-group-item px-0 px-md-3 col-3 col-md-2 title-font d-flex justify-content-center align-items-center">
                                        <a href="{{route('mod.userEdit', compact('user'))}}" class="btn btn-warning text-light">Vai</a>
                                    </li>
                                </ul>
                            @endforeach

                            <ul class="list-group list-group-horizontal row justify-content-center">
                                <li class="list-group-item col-6 col-md-4 title-font d-flex justify-content-center align-items-center">Nuovo Utente</li>
                                <li class="list-group-item col-6 col-md-4 title-font d-flex justify-content-center align-items-center">
                                    <a href="{{route('mod.userCreate')}}" class="btn btn-success text-light">Crea</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            @endif

        </div>
</x-layout>