<?php

namespace App\Http\Controllers;

use App\Imports\StandingImport;
use App\Models\Game;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('mod')->except('nextGameInfo');
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
        return isset($home_team) && isset($away_team)
               ? view('mod.gameEdit', compact('game','home_team','away_team'))
               : view('mod.setGame', compact('game'));
    }

    public function setGame(Game $game, Request $request)
    {
        $game->update([
            'home_team' => htmlentities($request->home_team, ENT_QUOTES, 'UTF-8'),
            'away_team' => htmlentities($request->away_team, ENT_QUOTES, 'UTF-8'),
        ]);
        return redirect(route('mod.gameEdit', compact('game')))->with('message', 'squadre inserite');
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
            'home_result' => htmlentities($request->home_result, ENT_QUOTES, 'UTF-8'),
            'away_result' => htmlentities($request->away_result, ENT_QUOTES, 'UTF-8'),
            'home_score' => $homeScore,
            'away_score' => $awayScore,
            'sign' => $request->sign
        ]);

        return back()->with('message', 'La partita è stata aggiornata con successo');
    }

    public static function nextGameInfo()
    {
        $games = Game::all();
        /* Next Match Logic */
        foreach($games as $game)
        {
            $gameDate = $game->game_date;
            if((new Carbon($gameDate))->gt(Carbon::now()))
            {
                $next_game = $game;
                break;
            }
        }
        if(isset($next_game)){
            return $next_game;
        } else{
            $final = Game::find(51);
            return $final;
        }
    }

    
}
