<x-layout> 

<div class="container px-5">

    <div class="row">
        <div class="col-12 w-100 d-flex justify-content-center align-items-center">
            <h1 class="text-dark title-font display-5 mb-0">Benvenuto {{Auth::user()->name ?? 'Guest'}}</h1>
        </div>
    </div>

    <div class="row px-xl-4 py-4 d-flex justify-content-center">

        <!-- <div class="col-12 col-xl-6 d-flex justify-content-center align-items-center my-3">
            <x-_standings/>
        </div> -->

        <div class="col-12 col-xl-6 d-flex justify-content-center align-items-center my-3">
            <x-_next-match :nextGameInfo="$nextGameInfo" />
        </div>
        
        <!-- <div class="col-12 col-xl-6 d-flex justify-content-center align-items-center my-3">
           <x-_calendar/> 
        </div> -->

        <!-- <div class="col-12 col-xl-6 d-flex justify-content-center align-items-center my-3">
            <x-_last-results/>
        </div> -->
    </div>
</div>

</x-layout>