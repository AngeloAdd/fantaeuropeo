<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use Illuminate\Http\Request;
use App\Models\Game;
use Carbon\Carbon;

class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        return view('bet.create', compact('nextGameInfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function show(Bet $bet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function edit(Bet $bet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bet $bet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bet $bet)
    {
        //
    }
}
