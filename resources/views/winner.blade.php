<x-layout> 

<x-slot name="style">

    <style>
        body {
            margin:0;
            padding:0;
            background: $light;
            overflow: hidden;
        }
    </style>

</x-slot>

<div class="pyro">
  <div class="before"></div>
  <div class="after"></div>
</div>

<div class="container-fluid d-flex flex-column align-items-center container-homepage-custom h-100 px-0">

    <div class="row mb-5">
        <div class="col-12 offset-md-3 d-flex justify-content-center align-items-center">
            <div class="w-100 rounded-pill bg-light border border-1 border-success text-success shadow py-1 px-4">
                <h1 class="my-1 text-center">Benvenuto {{Auth::user()->name ?? 'Guest'}}</h1>
            </div>
        </div>
    </div>

    <div class="row w-100 justify-content-center align-items-center px-2 pb-5 pt-md-5 pe-lg-5">
        <div class="col-12 offset-md-3 col-md-12 offset-lg-2 col-lg-9 mb-4 mb-md-0 d-flex justify-content-center align-items-center pe-0 home-page-position">
            <div class="d-flex justify-content-center align-items-center flex-column bg-secondary p-5 rounded-2">
                <h3 class="fs-2 text-light">The Winner of FantaPronostico Euro 2021 is</h2>
                <h2 class="display-5 title-font text-light">{{$standing[0]['user']->name}}</h1>
                <img src="/img/winner.webp" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</div>

</x-layout>