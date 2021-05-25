
        <div class="card w-100 h-100 shadow">
            <div class="card-header title-font bg-info text-light">Classifica</div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">

                    <div class="container-fluid p-0 justify-content-center">
                        <div class="row justify-content-around">
                            <div class="col-1 title-font d-flex justify-content-around align-items-center fs-5">#</div>
                            <div class="col-3 title-font d-flex justify-content-around align-items-center fs-5">Nome</div>
                            <div class="col-2 title-font d-flex justify-content-around align-items-center fs-5">Punti</div>
                            <div class="col-2 title-font d-none d-sm-flex justify-content-around align-items-center fs-5">Esatti</div>
                            <div class="col-2 title-font d-none d-sm-flex justify-content-around align-items-center fs-5">Segni</div>
                            <div class="col-2 title-font d-none d-sm-flex justify-content-around align-items-center fs-5">Gol</div>
                        </div>
                    </div>

                </li>
                @for($i=0; $i<7 ; $i++)
                
                <li class="list-group-item @if($i%2===0) bg-info text-light @endif">

                    <div class="container-fluid p-0 justify-content-center ">
                        <div class="row justify-content-around">
                            <div class="col-1 d-flex justify-content-center align-items-center fs-6">{{$i+1}}</div>
                            <div class="col-3 d-flex justify-content-center text-center align-items-center fs-6">Angelo Adduci</div>
                            <div class="col-2 d-flex justify-content-center align-items-center fs-6">27</div>
                            <div class="col-2 d-none d-sm-flex justify-content-center align-items-center fs-6">5</div>
                            <div class="col-2 d-none d-sm-flex justify-content-center align-items-center fs-6">7</div>
                            <div class="col-2 d-none d-sm-flex justify-content-center align-items-center fs-6">3</div>
                        </div>
                    </div>

                </li>
                @endfor
                
            </ul>
        </div>

       