<x-layout>
    <div class="container p-0 pb-0">
        <x-_game_bar :nextGame="$next_game" :games="$games" :game="$game"/>
        <div class="@if(!$game->final) d-none @endif row justify-content-center mb-3">
            <div class="col-12 col-sm-8 col-md-6 offset-md-3 offset-xl-2">
                <h2 class="title-font text-center display-1">FINALE</h2>
            </div>
        </div>
        <div class="row justify-content-center mb-3 p-0">
        <div class="col-12 col-md-9 offset-md-3 offset-xl-2">
            <div class="px-3 shadow bg-danger text-light mx-3 rounded-2 border-success">
                <div class="container-fluid px-0 py-0">
                    <div class="row p-0 justify-content-around">
                        <h2 class="text-center fs-1 pt-3 mb-0">L'incontro non è disponibile poichè non è stato ancora deciso o aggiornato</h2>
                        <p class="text-center fs-1">Torna più tardi.</p>

                        <div class="col-12 w-100 text-light text-center my-3 fs-5">
                            L'incontro si giocherà il 
                            {{(new Carbon\Carbon($game->game_date))->format('d ')}}
                            {{ucfirst((new Carbon\Carbon($game->game_date))->monthName)}}
                            {{(new Carbon\Carbon($game->game_date))->format(' Y')}}
                            alle 
                            {{(new Carbon\Carbon($game->game_date))->format('H:i')}}
                        </div>
                        <p class="col-12 d-flex align-items-center justify-content-center display-5 title-font py-3" id="countDown" data-date="{{(new Carbon\Carbon($game->game_date))->format('Y-m-d H:i:s')}}"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-layout>