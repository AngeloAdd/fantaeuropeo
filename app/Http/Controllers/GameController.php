<?php

namespace App\Http\Controllers;

use App\Imports\StandingImport;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('mod');
    }

    public function gamesIndex()
    {
        $games = Game::all();
        return view('mod.gamesIndex', compact('games'));
    }

    public function GameEdit(Game $game)
    {
        $teams = json_decode(\file_get_contents(storage_path('app/teams/teams.json')));
        foreach($teams as $team){
            if($team->national_team === $game->home_team){
                $home_team = $team;
            }
            if($team->national_team === $game->away_team){
                $away_team = $team;
            }
        }
        return view('mod.gameEdit', compact('game','home_team','away_team'));
    }

    public function GameUpdate(Game $game, Request $request)
    {
        if($request->home_result === '0'){
            $homeScore = $request->homeScore;
        } elseif($request->home_result > '0'){
            $homeScore = [];
            for($i=1; $i<=$request->home_result; $i++){
                array_push($homeScore, $request['homeScore'."$i"]);
            }
        }

        if($request->away_result === '0'){
            $awayScore = $request->awayScore;
        } elseif($request->away_result > '0'){
            $awayScore = [];
            for($i=1; $i<=$request->away_result; $i++){
                array_push($awayScore, $request['awayScore'."$i"]);
            }
        }

        $game->update([
            'home_result' => $request->home_result,
            'away_result' => $request->away_result,
            'home_score' => $homeScore,
            'away_score' => $awayScore,
            'sign' => $request->sign
        ]);

        return back()->with('message', 'La partita è stata aggiornata con successo');
    }

    
}