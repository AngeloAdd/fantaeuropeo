
        <div class="card w-100 h-100 shadow">
            <div class="card-header mx-3 rounded-2 standing-header-custom title-font bg-secondary text-light fs-2 text-center">Classifica</div>
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
                
                    @foreach($standing as $position => $player)
                        
                    @if(Route::currentRouteName() === '/')
                        @if(Auth::user() && ($player['user']->id == Auth::user()->id || $position == 0 || $position == 1 || $position == 2 || $position == 3))
                            <li class="@if(Auth::user() && Auth::user()->id === $player['user']->id) bg-secondary text-light my-2 @elseif($position%2===0) bg-info text-light @endif list-group-item">
                                <div class="container-fluid p-0 justify-content-center ">
                                    <div class="row justify-content-around">
                                        <div class="col-1 d-flex justify-content-center align-items-center fs-4">
                                            @if($position +1 == 1)
                                            <span class="badge rounded-pill first-place">{{$position+1}}</span>
                                            @elseif($position+1 == 2)
                                            <span class="badge rounded-pill second-place">{{$position+1}}</span>
                                            @elseif($position+1 == 3)
                                            <span class="badge rounded-pill third-place">{{$position+1}}</span>
                                            @elseif($position+1 == 4)
                                            <span class="badge rounded-pill bg-success">{{$position+1}}</span>
                                            @elseif($position+1 == 5)
                                            <span class="badge rounded-pill bg-success">{{$position+1}}</span>
                                            @elseif($position+1 == 6)
                                            <span class="badge rounded-pill bg-success">{{$position+1}}</span>
                                            @elseif($position+1 == 7)
                                            <span class="badge rounded-pill bg-primary">{{$position+1}}</span>
                                            @elseif($position+1 == 8)
                                            <span class="badge rounded-pill bg-primary">{{$position+1}}</span>
                                            @elseif($position+1 == count($standing))
                                            <span class="badge rounded-pill bg-dark text-light">{{$position+1}}</span>
                                            @else
                                                {{$position+1}}
                                            @endif
                                        </div>
                                        <div class="col-3 d-flex justify-content-center text-center align-items-center fs-6">{{$player['user']->name}}</div>
                                        <div class="col-2 d-flex justify-content-center align-items-center fs-6">{{$player['total']}}</div>
                                        <div class="col-2 d-none d-sm-flex justify-content-center align-items-center fs-6">{{$player['results']}}</div>
                                        <div class="col-2 d-none d-sm-flex justify-content-center align-items-center fs-6">{{$player['signs']}}</div>
                                        <div class="col-2 d-none d-sm-flex justify-content-center align-items-center fs-6">{{$player['scorers']}}</div>
                                    </div>
                                </div>
                            </li>
                        @elseif($position == 0 || $position == 1 || $position == 2 || $position == 3 ||  $position == 4)
                            <li class="@if($position%2===0) bg-info text-light @endif list-group-item">
                                <div class="container-fluid p-0 justify-content-center ">
                                    <div class="row justify-content-around">
                                        <div class="col-1 d-flex justify-content-center align-items-center fs-4">
                                            @if($position +1 == 1)
                                            <span class="badge rounded-pill first-place">{{$position+1}}</span>
                                            @elseif($position+1 == 2)
                                            <span class="badge rounded-pill second-place">{{$position+1}}</span>
                                            @elseif($position+1 == 3)
                                            <span class="badge rounded-pill third-place">{{$position+1}}</span>
                                            @elseif($position+1 == 4)
                                            <span class="badge rounded-pill bg-success">{{$position+1}}</span>
                                            @elseif($position+1 == 5)
                                            <span class="badge rounded-pill bg-success">{{$position+1}}</span>
                                            @elseif($position+1 == 6)
                                            <span class="badge rounded-pill bg-success">{{$position+1}}</span>
                                            @elseif($position+1 == 7)
                                            <span class="badge rounded-pill bg-primary">{{$position+1}}</span>
                                            @elseif($position+1 == 8)
                                            <span class="badge rounded-pill bg-primary">{{$position+1}}</span>
                                            @elseif($position+1 == count($standing))
                                            <span class="badge rounded-pill bg-dark text-light">{{$position+1}}</span>
                                            @else
                                                {{$position+1}}
                                            @endif
                                        </div>
                                        <div class="col-3 d-flex justify-content-center text-center align-items-center fs-6">{{$player['user']->name}}</div>
                                        <div class="col-2 d-flex justify-content-center align-items-center fs-6">{{$player['total']}}</div>
                                        <div class="col-2 d-none d-sm-flex justify-content-center align-items-center fs-6">{{$player['results']}}</div>
                                        <div class="col-2 d-none d-sm-flex justify-content-center align-items-center fs-6">{{$player['signs']}}</div>
                                        <div class="col-2 d-none d-sm-flex justify-content-center align-items-center fs-6">{{$player['scorers']}}</div>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @else
                        <li class="@if(Auth::user() && Auth::user()->id === $player['user']->id) bg-secondary text-light @elseif($position%2===0) bg-info text-light @endif list-group-item">
                            <div class="container-fluid p-0 justify-content-center ">
                                <div class="row justify-content-around">
                                    <div class="col-1 d-flex justify-content-center align-items-center fs-4">
                                        @if($position +1 == 1)
                                        <span class="badge rounded-pill first-place">{{$position+1}}</span>
                                        @elseif($position+1 == 2)
                                        <span class="badge rounded-pill second-place">{{$position+1}}</span>
                                        @elseif($position+1 == 3)
                                        <span class="badge rounded-pill third-place">{{$position+1}}</span>
                                        @elseif($position+1 == 4)
                                        <span class="badge rounded-pill bg-success">{{$position+1}}</span>
                                        @elseif($position+1 == 5)
                                        <span class="badge rounded-pill bg-success">{{$position+1}}</span>
                                        @elseif($position+1 == 6)
                                        <span class="badge rounded-pill bg-success">{{$position+1}}</span>
                                        @elseif($position+1 == 7)
                                        <span class="badge rounded-pill bg-primary">{{$position+1}}</span>
                                        @elseif($position+1 == 8)
                                        <span class="badge rounded-pill bg-primary">{{$position+1}}</span>
                                        @elseif($position+1 == count($standing))
                                        <span class="badge rounded-pill bg-dark text-light">{{$position+1}}</span>
                                        @else
                                            {{$position+1}}
                                        @endif
                                    </div>
                                    <div class="col-3 d-flex justify-content-center text-center align-items-center fs-6">{{$player['user']->name}}</div>
                                    <div class="col-2 d-flex justify-content-center align-items-center fs-6">{{$player['total']}}</div>
                                    <div class="col-2 d-none d-sm-flex justify-content-center align-items-center fs-6">{{$player['results']}}</div>
                                    <div class="col-2 d-none d-sm-flex justify-content-center align-items-center fs-6">{{$player['signs']}}</div>
                                    <div class="col-2 d-none d-sm-flex justify-content-center align-items-center fs-6">{{$player['scorers']}}</div>
                                </div>
                            </div>
                        </li>
                    @endif

                    @endforeach
                
            </ul>
        </div>

       