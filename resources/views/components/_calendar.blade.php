<div class="card w-100 h-100 mb-3 shadow" >
    
    <div class="card-header text-light bg-info">Calendario</div>
    
    <div class="card-body text-primary">
        <div class="container-fluid">
            <div class="row">
                @for($i=0; $i<=7 ; $i++)
                    <div class="col-6 d-flex justify-content-between align-items-center py-2 shadow">
                        <div class="p-1">
                            <div class="p-1">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b4/Flag_of_Turkey.svg" width="28" height="21" alt="">
                                Turchia
                            </div>
                            <div class="p-1">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Italy_Flag.svg/512px-Italy_Flag.svg.png" width="28" height="21" alt="">
                                Italia
                            </div>
                        </div>
                        <div class="p-1">
                            <p class="card-text m-0">11/6</p>
                            <p class="card-text m-0">21:00</p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>