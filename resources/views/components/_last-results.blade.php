<div class="card shadow w-100 h-100 mb-3">
  <div class="card-header bg-info text-light">Ultimi risultati</div>
  <div class="card-body text-primary d-flex justify-content-center align-items-center">
   <div class="container-fluid">
        <div class="row justify-content-around align-items-center">
            <div class="col-4 d-flex justify-content-center align-items-center fs-5 title-font">Pronostico</div>
            <div class="col-1 d-flex justify-content-center align-items-center fs-5 title-font">RE</div>
            <div class="col-2 d-flex justify-content-center align-items-center fs-5 title-font">SE</div>
            <div class="col-1 d-flex justify-content-center align-items-center fs-5 title-font">GOL</div>
            <div class="col-4 d-flex justify-content-center align-items-center fs-5 title-font">MATCH</div>
        </div>
        @for($i=0; $i<=7 ; $i++)

        <div class="row justify-content-around align-items-center">
            <div class="col-4 d-flex justify-content-center align-items-center">1-2 X Fernandello</div>
            <div class="col-1 d-flex justify-content-center align-items-center">5</div>
            <div class="col-2 d-flex justify-content-center align-items-center">1</div>
            <div class="col-1 d-flex justify-content-center align-items-center">4</div>
            <div class="col-4 d-flex justify-content-center align-items-center flex-column">
                <div class="dropdown">
                    <button class="btn btn-link" type="button" id="resultIncontro1" data-bs-toggle="dropdown" aria-expanded="false">
                        Turchia-Italia
                        <i class="bi bi-file-diff"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="resultIncontro1">
                        <li class="dropdown-item">45' haltintop (TU)</li>
                        <li class="dropdown-item">65' DeRossi (IT)</li>
                        <li class="dropdown-item">87' Montolivo (IT)</li>
                    </ul>
                </div>
            </div>
        </div>
        
        @endfor
   </div>
  </div>
</div>