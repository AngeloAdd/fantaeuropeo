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
        $homeTeamName = $nextGame->home_team;
        $awayTeamName = $nextGame->away_team;
        $teams = json_decode(file_get_contents(storage_path('app/teams/teams.json')));
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
        $nextGameInfo = [
            'next_game' => $nextGame,
            'home_team' => $homeTeam,
            'away_team' => $awayTeam];

        $standing = UserController::standing();
        $homeStanding = [];
        foreach($standing as $position => $player){
            if(Auth::user() && $player['user']->id === Auth::user()->id && count($standing)>5){
                if($position ==='0'){
                    $homeStanding = [
                        $position => $standing[$position],
                        $position + 1 =>$standing[$position + 1],
                        $position + 2 => $standing[$position + 2],
                        $position + 3 => $standing[$position + 3],
                        $position + 4 => $standing[$position + 4]
                    ];
                }
                elseif($position === '1'){
                    $homeStanding = [
                        $position -1 => $standing[$position - 1],
                        $position =>$standing[$position],
                        $position + 1 => $standing[$position + 1],
                        $position + 2 => $standing[$position + 2],
                        $position + 3 => $standing[$position + 3]
                    ];
                }
                else{
                    $homeStanding = [
                        $position -2 => $standing[$position - 2],
                        $position - 1 =>$standing[$position - 1],
                        $position => $standing[$position],
                        $position + 1 => $standing[$position + 1],
                        $position + 2 => $standing[$position + 2]
                    ];
                } 
                
            }else{
                $homeStanding = $standing;
            }
        }
        
        /* Calendar Logic */

        return view('homepage', compact('nextGameInfo', 'standing', 'homeStanding'));
    }
}
