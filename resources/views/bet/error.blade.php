<x-layout>
    <div class="container p-5 pb-0">
        <x-_game_bar :nextGame="$next_game" :games="$games" :game="$game"/>
        <div class="row p-md-5">
            <div class="col-12 col-md-9 offset-md-3 col-xl-10 offset-xl-2 d-flex justify-content-center align-items-center">
                <h1 class="p-3 text-center bg-primary rounded-2 text-light">Il pronostico che stai cercando non è ancora disponibile perchè l'incontro non è stato ancora deciso. Torna più tardi.</h1>
            </div>
        </div>
    </div>
</x-layout>