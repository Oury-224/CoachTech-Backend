<?php

namespace App\Http\Controllers\API;

use Auth;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthentificationController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Register user.
     *
     * @ \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // verification de la validation des données
       $validate =  $request->validate([
        'name' => 'required',
        'email'=>'required',
        'presentation'=>'required'
        ]);

        if ($request->password == $request->confirmer){
            $user = User::create([
            'name' => $request -> name,
            'email' => $request ->email,
            'password' => Hash::make($request -> password),
            'etat' => 0,
            'role_id'=>$request->role_id,
            'presentation'=>$request->presentation,
            ]);
            return response()->json([
                    'message' => 'Utilisateur enregistré succès',
                    'user' => $user
                     ], 201);
        }else{
            //lorsque le mot de passe et la confirmation ne correspondent pas;
            dd('le mot de passe et la confirmation ne correspondent pas');
        }
    }

    /**
     * login user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validation des données.
        $validate =  $request->validate([
        'pseudo' => 'required',
        'password'=>'required',
        ]);
        // // authentification de l'utilisateur.
        $pseudo = $request->pseudo;
        $password = $request->password;
        $authent = ['name'=>$pseudo,'password'=>$password];
        //la redirection de l'utilisateur.
        if(Auth::attempt($authent)){
            return response()->json([
                'message' => 'Authentification faite avec succès',
                'user' => $authent
            ]);
        }else{
            return response()->json(['error' => 'Unauthorized'], 401);
        };
    }
    /**
     * Logout user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully logged out.']);
    }

    /**
     * Refresh token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get user profile.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
