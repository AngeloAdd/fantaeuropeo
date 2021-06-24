<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Game;
use Carbon\Carbon;
use App\Http\Requests\BetRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BetController extends Controller
{
    private $games;

    public function __construct()
    {
        $this->games = Game::all();
        $this->middleware(['auth', 'first.log']);
    }

    public function timeValidation(Game $game)
    {
        $next_game = GameController::nextGameInfo(); 
        $gameDate = new Carbon($game->game_date);
        $diff = $gameDate->diffInHours(Carbon::now());
        if($diff <= 22 || Carbon::now()->gt(new Carbon($gameDate))||$game->id ===$next_game->id){
            return true;
        }
    }

    public function timeValidationFromInput(Request $request)
    {
        $next_game = GameController::nextGameInfo();
        $game = Game::find($request->game_id);
        $games = $this->games;
        
        return isset($game) && $this->timeValidation($game)
               ? redirect(route('bet.create', compact('game')))
               : view('bet.time_error', compact('game', 'games', 'next_game'));
    }

    public function timeValidationFromMenu(Game $game)
    {
        $next_game = GameController::nextGameInfo();
        $games = $this->games;

        return isset($game) && $this->timeValidation($game)
               ? redirect(route('bet.create', compact('game')))
               : view('bet.time_error', compact('game', 'games', 'next_game'));
    }

    public function nextGame()
    {
        $next_game = GameController::nextGameInfo();

        // controllo incontro settato o no
        return $next_game->home_team === 'null' || $next_game->home_team === 'null'
               ? redirect(route('errore.fase', ['game' => $next_game]))
               : redirect(route('bet.create', ['game' => $next_game]));
    }

    public function create(Game $game) 
    {   
        
        //Controllo per non anticipare troppo i pronostici
        if(!$this->timeValidation($game)){
            return view('bet.time_error', compact('games','game','next_game'));
        };

        // controllo per fase eliminatoria con incontri da settare
        if($game->home_team === 'null' || $game->away_team === 'null'){
            return redirect(route('errore.fase', compact('game')));
        }

        $games = $this->games;
        $next_game = GameController::nextGameInfo();
        $teams = json_decode(file_get_contents(storage_path('app/teams/teams.json')));
        $home_team = '';
        $away_team = '';
        foreach($teams as $team)
        {
            if($team->national_team === $game->home_team){
                $home_team = $team;
            }
            elseif($team->national_team === $game->away_team){
                $away_team = $team;
            }
        }

        $bets = Auth::user()->bets;
        foreach($bets as $bet){
            if($bet->game_id === $game->id){
                $current_bet = $bet;
            }
        }

        //Controllo per presenza pronostico
        if(isset($current_bet) && !(Carbon::now()->gte(new Carbon($game->game_date)))){
            return view('bet.current', compact('game', 'games','next_game','home_team','away_team'), ['userBet'=>$current_bet]);
        }

        // controllo per display pronostici con sort per ordinarli
        if(Carbon::now()->gte(new Carbon($game->game_date))){
            $game_bets= [];
            foreach($game->bets as $bet){
                array_push($game_bets, $bet);
            }

            function customSort($a, $b)
            {
                if((new Carbon($a->updated_at))->gt((new Carbon($b->updated_at)))){
                    return 1;
                } else {
                    return 0;
                }
            }
            usort($game_bets, function($a, $b)
            {
                if((new Carbon($a->updated_at))->gt((new Carbon($b->updated_at)))){
                    return 1;
                } else {
                    return 0;
                }
            });
            $sortedBets = array_reverse($game_bets, true);
            return view('bet.display', compact('game', 'games','next_game','home_team','away_team','sortedBets'));
        }
        
        
        return view('bet.create', compact('game', 'games','home_team', 'away_team','next_game'));
        
    }

    public function gameError(Game $game) 
    {   
        $next_game = GameController::nextGameInfo();
        $games = Game::all();
        return isset($home_team) && isset($away_team)
               ? redirect(route('bet.create', compact('game')))
               : view('bet.error', compact('games','game','next_game'));
    }

    public function store(BetRequest $request, Game $game){
        
        // Controllo per limite di tempo
        if(Carbon::now()->gte(new Carbon($game->game_date))){
            return back()->with('error_message','Hai superato il limite di tempo!');
        }
        
        //Controllo per doppi pronostici
        if(Bet::where('user_id', Auth::user()->id)->where('game_id',$game->id)->first()){
            return back()->with('error_message','Hai gia un pronostico');
        }

        // validazione
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
                'home_result' => htmlentities($request->home_result, ENT_QUOTES, 'UTF-8'),
                'away_result' => htmlentities($request->away_result, ENT_QUOTES, 'UTF-8'),
                'sign' => $request->sign,
                'home_score' => $request->homeScore,
                'away_score' => $request->awayScore,
                'user_id' => Auth::user()->id
            ]);
            return back()->with('message','Pronostico inserito con successo');
        }
        else {
            $game->bets()->create([
                'home_result' => htmlentities($request->home_result, ENT_QUOTES, 'UTF-8'),
                'away_result' => htmlentities($request->away_result, ENT_QUOTES, 'UTF-8'),
                'sign' => $request->sign,
                'user_id' => Auth::user()->id
            ]);
            return back()->with('message','Pronostico inserito con successo');
        }
    }

    public function edit(Bet $bet)
    {
        // controllo per accesso a pronostici diversi dal proprio
        if(Auth::user()->id !== $bet->user_id){
            return redirect(route('/'));
        }

        $games = $this->games;
        $game = Game::find($bet->game_id);
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

        //Controllo per modifica oltre tempo limite
        if(Carbon::now()->gte(new Carbon($game->game_date))){
            return redirect(route('bet.create', compact('game')));
        }

        // Controllo per view edit
        if(isset($home_team) && isset($away_team)){
            return view('bet.edit', compact('bet', 'game','home_team', 'away_team'));
        } else {
            return redirect(route('errore.fase', compact('games','game')));
        }
    }

    public function update(BetRequest $request, Bet $bet)
    {
        // Controllo per caricamento pronostico oltre il limite 
        if(Carbon::now()->gte(new Carbon($bet->game->game_date))){
            return back()->with('error_message','Hai superato il limite di tempo!');
        }

        // validazione 
        if($bet->game_id > 36)
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
            $bet->update([
                'home_result' => htmlentities($request->home_result, ENT_QUOTES, 'UTF-8'),
                'away_result' => htmlentities($request->away_result, ENT_QUOTES, 'UTF-8'),
                'sign' => $request->sign,
                'home_score' => $request->homeScore,
                'away_score' => $request->awayScore,
                'user_id' => Auth::user()->id,
            ]);
        }
        else {
            $bet->update([
                'home_result' => htmlentities($request->home_result, ENT_QUOTES, 'UTF-8'),
                'away_result' => htmlentities($request->away_result, ENT_QUOTES, 'UTF-8'),
                'sign' => $request->sign,
                'user_id' => Auth::user()->id,
            ]);
        }
        return redirect(route('bet.create',['game'=>$bet->game]))->with('message','Pronostico modificato con successo');

    }

    public function indexWinner()
    {
        $champion_bets = json_decode(substr(file_get_contents(storage_path('app/teams/champions.json')), 3));
        return view('bet.indexWinner',compact('champion_bets'));
    }
}
