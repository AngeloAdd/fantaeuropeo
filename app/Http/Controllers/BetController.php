<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use Illuminate\Http\Request;
use App\Models\Game;
use Carbon\Carbon;
use App\Http\Requests\BetRequest;
use Illuminate\Support\Facades\Validator;

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

    public function nextGameInfo()
    {
        $games = Game::all();
        $dateNow = Carbon::now()->format('d-m-Y H:i:s.u');
        /* Next Match Logic */
        foreach($games as $game)
        {
            $gameDate = $game->game_date;
            if((new Carbon($gameDate))->gt(new Carbon($dateNow)))
            {
                $next_game = $game;
                break;
            }
        }
        return $next_game;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nextGame()
    {
        $next_game = $this->nextGameInfo();
        return redirect(route('bet.create', ['game' => $next_game]));
    }

    public function create(Game $game) 
    {   
        $games = Game::all();
        $next_game = $this->nextGameInfo();
        $teams = json_decode(file_get_contents(storage_path('app/teams/teams.json')));
        foreach($teams as $team)
        {
            if($team->national_team === $game->home_team){
                $home_team = $team;
            }
            elseif($team->national_team === $game->away_team){
                $away_team = $team;
            }
        }
        if(isset($home_team) && isset($away_team)){
            return view('bet.create', compact('game', 'games','home_team', 'away_team','next_game'));
        } else {
            return redirect(route('errore.fase', compact('games','game')));
        }
    }

    public function gameError(Game $game) 
    {   
        $games = Game::all();
        if(isset($home_team) && isset($away_team)){
            return redirect(route('bet.create', compact('game')));
        } else {
            return view('bet.error', compact('games','game'));
        }
    }

    public function timeValidation(Game $game)
    {
        $games = Game::all();
        $next_game = $this->nextGameInfo();
        $gameDate = new Carbon($game->game_date);
        $now = Carbon::now();
        $diff = $gameDate->diffInHours($now);
        if($diff <= 24){
            return redirect(route('bet.create', compact('game')));
        } else {
            return view('bet.time_error', compact('games','game','next_game'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BetRequest $request, Game $game)
    {
        
        if($game->id > 36)
        {

            $validator = Validator::make($request->all(), [
                'homeScore' => 'required',
                'awayScore' => 'required',
            ], [
                'homeScore.required' => 'Il campo è richiesto',
                'awayScore.required' => 'Il campo è richiesto'
            ]);
            if ($validator->fails()) {
                return back()
                ->withErrors($validator)
                ->withInput();
            }
            $game->bets()->create([
                'home_result' => $request->home_result,
                'away_result' => $request->away_result,
                'sign' => $request->sign,
                'home_score' => $request->homeScore,
                'away_score' => $request->awayScore,
                'user_id' => 1
            ]);
        }
        else {
            $game->bets()->create([
                'home_result' => $request->home_result,
                'away_result' => $request->away_result,
                'sign' => $request->sign,
                'user_id' => 1
            ]);
        }
        
        
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
