<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('mod')->except(['resetPassword','storePassword']);
    }

    public function resetPassword() {
    
        return view('password.reset');
    }
    public function storePassword(Request $request) {

        $user = Auth::user();
        
        $hashedPassword = $user->password;
        if(Hash::check($request->old_password, $hashedPassword)){
            $validator = Validator::make($request->all(),[
                'password' =>'required|confirmed|min:4|max:8',
                'password_confirmation'=>'required|min:4|max:8'
            ],
            [
                'password.confirmed'=>'Le password non corrispondono',
                'password.required' =>'Immetti una nuova password',
                'password_confirmation.required' =>'Reimmetti la password scelta',
                'password.min' => 'La password deve avere minimo :min caratteri',
                'password.max' => 'La password deve avere massimo :max caratteri',
            ]);
            if($validator->fails()){
                return redirect(route('password.reset'))
                        ->withErrors($validator)
                        ->withInput();
            }
            $user->password = bcrypt($request['password']);
            $user->first_time_login = true;
            $user->save();
            return redirect(route('/'));
        }

        return back()->with('error_message', 'La vecchia password non corrisponde');
    }

    public function modIndex()
    {
        return view('mod.index');
    }
    public function modUsersIndex()
    {
        $users = User::all();
        return view('mod.usersIndex', compact('users'));
    }
    public function modUserEdit(User $user)
    {
        return view('mod.userEdit', compact('user'));
    }

    public function modUserUpdate(Request $request, User $user) 
    {
        $validator = Validator::make($request->all(),[
            'password' =>'required|confirmed|min:4|max:8',
            'password_confirmation'=>'required|min:4|max:8'
        ],
        [
            'password.confirmed'=>'Le password non corrispondono',
            'password.required' =>'Immetti una nuova password',
            'password_confirmation.required' =>'Reimmetti la password scelta',
            'password.min' => 'La password deve avere minimo :min caratteri',
            'password.max' => 'La password deve avere massimo :max caratteri',
        ]);
        if($validator->fails()){
            return redirect(route('password.reset'))
                    ->withErrors($validator)
                    ->withInput();
        }
        $user->name = $request->name;
        $user->password = bcrypt($request['password']);
        $user->save();
        return redirect(route('mod.userEdit', compact('user')))->with('message', 'Dati modificati con successo');
    }

    public function modUserCreate()
    {
        return view('mod.userCreate');
    }
    public function modUserStore(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'password' =>'required|confirmed|min:4|max:8',
            'password_confirmation'=>'required|min:4|max:8'
        ],
        [
            'password.confirmed'=>'Le password non corrispondono',
            'password.required' =>'Immetti una nuova password',
            'password_confirmation.required' =>'Reimmetti la password scelta',
            'password.min' => 'La password deve avere minimo :min caratteri',
            'password.max' => 'La password deve avere massimo :max caratteri',
        ]);
        if($validator->fails()){
            return redirect(route('password.reset'))
                    ->withErrors($validator)
                    ->withInput();
        }
        $user = new User();
        $password = $request['password'];
        $name = $request->name;
        $user->name = $name;
        $user->password = Hash::make($password);
        $user->save();

        return redirect(route('mod.users'))->with('messaggio', 'Nuovo utente creato');
    }

    public function modUserDelete(Request $request, User $user)
    {
        $deleteControl = $request->mod;
        if(Auth::user()->name === $deleteControl)
        {
            if($user->admin){
                return back()->with('message', 'Non hai i permessi per cancellare questo utente');
            }
            $user->delete();
            return redirect(route('mod.users'))->with('messagge', 'utente cancellato');
        }
        return back()->with('message', 'la cancellazione NON è andata a buon fine');
    }

    public function total()
    {

    }

    public function standing(){

        $usersInfo = User::all();

        $users = [];
        foreach($usersInfo as $user){
            $userStanding = [
                'user'=>$user,
                'total' => 0,
                'results' => 0,
                'signs' => 0,
                'scorers' => 0,
                'final_bet' => 0,
                'final_tot' => ""];
            array_push($users, $userStanding);
        }
        
        $results = [];
        foreach($users as $user){
            foreach($user['user']->bets as $bet){
                
                $scores = [];
                array_push($scores,$bet->game->home_score);
                array_push($scores,$bet->game->away_score);
                $scorers = Arr::flatten($scores);
                
                if($bet->game->home_result === $bet->home_result && $bet->game->away_result === $bet->away_result && $bet->game->sign === $bet->sign){
                    $count = 0;
                    foreach($scorers as $scorer){
                        if($bet->home_score === $scorer || $bet->away_score === $scorer){
                            $count++;    
                        }
                    }
                    $user['total'] = $user['total'] + 5 + ($count*2);
                    $user['results'] = $user['results'] + 1;
                    $user['signs'] = $user['signs'] +1;
                    $user['scorers'] = $user['scorers'] + $count;
                    if($bet->game->final){
                        $user['final_bet'] = $bet->updated_at;
                        $user['final_tot'] = 5 + ($count*2);
                    }
                }
                elseif($bet->game->home_result === $bet->home_result && $bet->game->away_result === $bet->away_result && $bet->game->sign !== $bet->sign){
                    $count = 0;
                    foreach($scorers as $scorer){
                        if($bet->home_score === $scorer || $bet->away_score === $scorer){
                            $count++;
                        }
                    }
                    $user['total'] = $user['total'] + 4 + ($count*2);
                    $user['results'] = $user['results'] + 1;
                    $user['scorers'] = $user['scorers'] + $count;
                    if($bet->game->final){
                        $user['final_bet'] = $bet->updated_at;
                        $user['final_tot'] = 4 + ($count*2);
                    }
                }
                elseif(!($bet->game->home_result === $bet->home_result && $bet->game->away_result === $bet->away_result) && $bet->game->sign === $bet->sign){
                    $count = 0;
                    foreach($scorers as $scorer){
                        if($bet->home_score === $scorer || $bet->away_score === $scorer){
                            $count++;
                        }
                    }
                    $user['total'] = $user['total'] + 1 + ($count*2);
                    $user['signs'] = $user['signs'] +1;
                    $user['scorers'] = $user['scorers'] + $count;
                    if($bet->game->final){
                        $user['final_bet'] = $bet->updated_at;
                        $user['final_tot'] = 1 + ($count*2);
                    }
                }
                elseif(($bet->game->home_result !== $bet->home_result && $bet->game->away_result !== $bet->away_result) && $bet->game->sign !== $bet->sign){
                    $count = 0;
                    foreach($scorers as $scorer){
                        if($bet->home_score === $scorer || $bet->away_score === $scorer){
                            $count++;
                        }
                    }
                    $user['total'] = $user['total'] + ($count*2);
                    $user['scorers'] = $user['scorers'] + $count;
                    if($bet->game->final){
                        $user['final_bet'] = $bet->updated_at;
                        $user['final_tot'] = ($count*2);
                    }
                }

                
            }
            array_push($results, $user);
        }
        
        usort($results, function($a, $b){
            if($a['total']>$b['total']){
                return 1;
            }

            if($a['total']==$b['total'] && $a['results']>$b['results']){
                return 1;
            }

            if($a['total']= $b['total'] && $a['results']==$b['results'] && $a['scorers']>$b['scorers']){
                return 1;
            }

            if($a['total']= $b['total'] && $a['results']==$b['results'] && $a['scorers']==$b['scorers'] && $a['signs']>$b['signs']){
                return 1;
            }

            if($a['total']= $b['total'] && $a['results']==$b['results'] && $a['scorers']==$b['scorers'] && $a['signs']==$b['signs'] && $a['final_tot']>$b['final_tot']){
                return 1;
            }

            if($a['total']= $b['total'] && $a['results']==$b['results'] && $a['scorers']==$b['scorers'] && $a['signs']==$b['signs'] && $a['final_tot']==$b['final_tot'] && (new Carbon($a['final_bet']))->gt((new Carbon('final_bet')))){
                return 1;
            }
        });

        $officialStanding = array_reverse($results);
        return view('bet.standing', compact('officialStanding'));

    }
}
