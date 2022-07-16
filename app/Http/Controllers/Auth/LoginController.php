<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){
         // Validation des données.
        $validate =  $request->validate([
            'pseudo' => 'required',
            'password'=>'required',
        ]);
        // authentification de l'utilisateur.
       $pseudo = $request->pseudo;
       $password = $request->password;
       $authent = ['name'=>$pseudo,'password'=>$password];
        //la redirection de l'utilisateur.
       if(Auth::attempt($authent)){
            return redirect('home')->with('info',"Bienvenue sur notre Plateforme");
       }else{
            return back()->with('error',"Nom d'utilisateur ou Mot de passe incorrecte");
       };
    }
    public function logout(){
         auth()->logout();
         return view('auth.login');
    }

}
