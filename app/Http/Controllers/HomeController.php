<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* $this->middleware('auth'); */
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $standing = UserController::standing();
        if(Carbon::now()->gt(new Carbon('12-07-2021 2:00'))){
            return view('winner', compact('standing'));
        }
        /* general variables */
        $games = Game::all();
        $date = Carbon::now()->format('d-m-Y H:i:s.u');


        /* Next Match Logic */
        foreach($games as $game)
        {
            $gameDate = $game->game_date;
            if((new Carbon($gameDate))->gt(new Carbon($date)))
            {
                $nextGame = $game;
                break;
            }
        }
        if(isset($nextGame)){

            $homeTeamName = $nextGame->home_team;
            $awayTeamName = $nextGame->away_team;
            $teams = json_decode(file_get_contents(storage_path('app/json/teams.json')));
            foreach($teams as $team)
            {
                if($team->national_team === $homeTeamName)
                {
                    $homeTeam = $team;
                } elseif ($team->national_team === $awayTeamName)
                {
                    $awayTeam = $team;
                }
            }
        }

            if((!isset($homeTeam) || !isset($awayTeam)) && !isset($nextGame)){
                $nextGameInfo = [
                    'next_game' => 'empty',
                    'home_team' => 'empty',
                    'away_team' => 'empty'];
                } else{
                    
                    $nextGameInfo = [
                        'next_game' => $nextGame,
                        'home_team' => $homeTeam,
                        'away_team' => $awayTeam];
                    }
                

        $final_date = Game::find(51)->game_date;
        return view('homepage', compact('nextGameInfo', 'standing','final_date'));
}
}