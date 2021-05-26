<x-layout>

    @foreach($teams as $team)
        <p class="text-dark">{{$team->name}}</p>
        <p class="text-dark">{{$team->sk}}</p>
        <img src="{{Storage::url($team->img)}}" width="50" height="30" alt="">
    @endforeach
</x-layout>