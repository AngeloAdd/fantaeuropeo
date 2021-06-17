<x-layout>
<div class="container mt-5">
    @if(session('message'))
        <div class="row justify-content-center">
            <div class="offset-2 col-8">
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            </div>
        </div>
    @endif
    @if(session('error_message'))
        <div class="row justify-content-center">
            <div class="offset-2 col-8">
                <div class="alert alert-danger">
                    {{session('error_message')}}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-12 col-md-9 offset-md-3 col-xl-10 offset-xl-2 d-flex  justify-content-center align-items-center">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Gestisci ') }}{{$user->name}}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('mod.userUpdate', compact('user')) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3 row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" value="{{$user->name}}" type="name" class="form-control @error('name') is-invalid @enderror" name="name">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="mb-3 row mb-0">
                                        <div class="col-12 col-sm-6 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success text-light">
                                                {{ __('Modifica Info') }}
                                            </button>
                                        </div>
                                        <div class="col-12 col-sm-6 mt-2 mt-sm-0 d-flex justify-content-center">
                                            <button type="button" class="btn btn-danger text-light" data-bs-toggle="modal" data-bs-target="#deleteUser">
                                                Cancella Utente
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteUserLabel">Cancella {{$user->name}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('mod.userDelete',compact('user'))}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-body">
                Sei sicuro di voler eliminare l'utente: {{$user->name}}?
                <label for="deleteUserInput" class="text-danger">Inserisci qui il tuo nome ({{Auth::user()->name}}) per procedere alla cancellazione</label>
                <input id="deleteUserInput" class="form-control" type="text" name="mod" autocomplete="off">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary text-light">Cancella {{$user->name}}</button>
            </div>
        </form>
    </div>
  </div>
</div>
</x-layout>