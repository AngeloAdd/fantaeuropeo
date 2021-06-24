<x-layout> 

<div class="container-fluid d-flex flex-column align-items-center container-homepage-custom h-100 px-0">

    <div class="row mb-5">
        <div class="col-12 offset-md-3 d-flex justify-content-center align-items-center">
            <div class="w-100 rounded-pill bg-light border border-1 border-success text-success shadow py-1 px-4">
                <h1 class="my-1 text-center">Benvenuto {{Auth::user()->name ?? 'Guest'}}</h1>
            </div>
        </div>
    </div>

    <div class="row w-100 justify-content-center align-items-center px-2 pb-5 pt-md-5 pe-lg-5">
        <div class="col-12 offset-md-3 col-md-6 offset-lg-2 col-lg-5 mb-4 mb-md-0 d-flex justify-content-center align-items-center pe-0 home-page-position">
            <x-_standings :standing="$standing" />
        </div>
        <div class="col-12 offset-md-3 col-sm-10 col-md-6 offset-lg-0 col-lg-4 mt-5 mt-lg-0 d-flex justify-content-center align-items-center pe-0">
            @if(!(Carbon\Carbon::now()->gt(new Carbon\Carbon($final_date))) && ($nextGameInfo['home_team'] === 'empty' || $nextGameInfo['away_team'] === 'empty'))
                <div class="h-100 w-100 bg-success d-flex justify-content-center align-items-center flex-column p-3 rounded-2">
                    <h2 class="text-light text-center">I contendenti non sono ancora decisi quindi ecco una foto di Erik per consolarti</h2>
                    <img src="/img/erik.jpg" class="img-fluid" alt="">
                </div>
            @elseif((Carbon\Carbon::now()->gt(new Carbon\Carbon($final_date))) && ($nextGameInfo['home_team'] === 'empty' || $nextGameInfo['away_team'] === 'empty'))
                <div class="h-100 w-100 bg-success d-flex justify-content-center align-items-center flex-column p-3 rounded-2">
                    <h2 class="text-light text-center">È attualmente in corso la finale attendi la fine della competizione per sapere di quanto  hai perso.</h2>
                    <img src="/img/table.webp" class="img-fluid rounded-2" alt="">
                </div>
            @else
            <x-_next-match :nextGameInfo="$nextGameInfo" />
            @endif
        </div>
    </div>
</div>

</x-layout>