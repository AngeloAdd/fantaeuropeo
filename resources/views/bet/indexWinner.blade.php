<x-layout>
<div class="container-fluid py-3 mt-5">

    <div class="row justify-content-center">
        <div class="col-12 col-md-9 offset-md-3 col-xl-8 offset-xl-2">
            <div class="card shadow">
            <div class="card-header shadow bg-warning text-light mx-3 next-match-header-custom rounded-2 border-warning">
                <div class="container-fluid px-0 py-0">
                    <div class="row p-0 justify-content-around">
                        <div class="col-12 col-md-6 order-md-1 d-flex flex-column jsutify-content-center align-items-center py-3">
                            <p class="title-font fs-4 m-1">Squadra vincente</p>
                            <img src="/img/coppaEuro.svg" class="img-fluid d-none d-md-inline" width="120" height="80" alt="">
                        </div>
                        <div class="col-12 col-md-6 order-md-3 d-flex flex-column jsutify-content-center align-items-center py-3">
                            <p class="title-font fs-4 m-1">Capocannoniere</p>
                            <img src="/img/golden_boot.svg" class="img-fluid d-none d-md-inline" width="120" height="80" alt="">
                        </div>
                        <div class="col-12 w-100 text-light text-center my-3 fs-5">
                            Inserisci Pronostico Vincente e Capocannoniere
                        </div>
                    </div>
                </div>
            </div>
                <div class="card-body pt-0">
                    <div class="container-fluid justify-content-center align-items-center px-0 px-md-3">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">
                                <div class="container-fluid px-0 pe-md-4">
                                    <ul class="list-group list-group-horizontal row">
                                        <li class="list-group-item col-4 title-font text-bold">Nome</li>
                                        <li class="list-group-item col-4 title-font text-bold">Vincitore</li>
                                        <li class="list-group-item col-4 title-font text-bold">Capocannoniere</li>
                                    </ul>
                                    @foreach($champion_bets as $key => $bet)
                                        <ul class="list-group list-group-horizontal row">
                                            <li class="list-group-item col-4 @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif ">{{App\Models\User::find($bet->user_id)->name}}</li>
                                            <li class="list-group-item col-4 @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif ">{{$bet->champion_team}}</li>
                                            <li class="list-group-item col-4 @if($key%2 ===0)bg-primary text-light @else bg-white text-dark @endif ">{{$bet->top_scorer}}</li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                
                </div>
            </div>
        </div>

    </div>
</div>

</x-layout>