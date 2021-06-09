<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    public function modUsers()
    {
        $users = User::all();
        return view('mod.users', compact('users'));
    }
    public function modUserShow(User $user)
    {
        return view('mod.userShow', compact('user'));
    }

    public function modChangeUserInfo(Request $request, User $user) 
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
        return redirect(route('mod.userShow', compact('user')))->with('message', 'Dati modificati con successo');
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
}
