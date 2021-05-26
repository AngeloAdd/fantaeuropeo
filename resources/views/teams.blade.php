<x-layout>
<div class="container">
    <div class="row">
        @foreach($teams as $team)
            <div class="col-3 mb-3">
                <div class="card text-dark mb-3">
                    <div class="card-header text-white bg-info">{{$team->name}}</div>
                    <div class="card-body">
                        <h5 class="card-title">{{$team->sk}}</h5>
                        <p class="card-text">
                            <img src="{{Storage::url($team->img)}}" width="45" height="30" alt="">
                        </p>
                    </div>
                </div>
            </div>
        @endforeach 
    </div>
</div>
  
</x-layout>