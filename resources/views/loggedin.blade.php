<x-layout>
<div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header main-text bg-dark title-font text-center">Welcome {{Auth::user()->name}}</div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p class="mb-2">Sei loggato!</p>
                        <p class="mt-0 mb-1">Sarai presto reindirizzato alla homepage.</p>
                        <span class="spinner-border spinner-border-sm text-primary me-1" role="status" aria-hidden="true"></span>
                        <a href="/" class="">Clicca qui per essere reindirizzato immediatamente.</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script> setTimeout(function(){window.location='/'}, 4000); </script> 
    @endpush
</x-layout>