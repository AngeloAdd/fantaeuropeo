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
    @if(session('error_message'))
        <div class="row justify-content-center">
            <div class="col-8">
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
                            <div class="card-header">Crea Nuovo Utente</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('mod.userStore') }}">
                                    @csrf

                                    <div class="mb-3 row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" value="{{old('name')}}" type="name" class="form-control @error('name') is-invalid @enderror" name="name">

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
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Crea Nuovo Utente') }}
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
</x-layout>