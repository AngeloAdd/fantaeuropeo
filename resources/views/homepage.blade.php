<x-layout> 

<div class="container-fluid d-flex flex-column align-items-center container-homepage-custom h-100">
    
    

    <div class="row mb-auto">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <div class="w-100 rounded-pill bg-light border border-1 border-success text-success shadow py-1 px-4">
                <h1 class="my-1 text-center">Benvenuto {{Auth::user()->name ?? 'Guest'}}</h1>
            </div>
        </div>
    </div>

    <div class="row my-auto justify-content-center align-items-center">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <x-_next-match :nextGameInfo="$nextGameInfo" />
        </div>
    </div>
</div>

</x-layout>