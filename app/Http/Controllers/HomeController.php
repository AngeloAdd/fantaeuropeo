<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Carbon\Carbon;

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

        /* Calendar Logic */

        return view('homepage', compact('nextGameInfo'));
    }
}
