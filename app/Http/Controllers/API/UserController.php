<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Profile;
use App\Models\Competence;
use Illuminate\Http\Request;
use App\Mail\EnvoiMarkdownMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(){
        $user = User::with('competences')->get();
        return response()->json($user);
    }
    public function createuser(){
        $roles = Role::all();
        return response()->json($roles);
    }
    public function add_user(Request $request)
    {
         // verification de la validation des données
       $validate =  $request->validate([
        'name' => ['required','min:3','max:20'],
        'email'=>'required',
        'presentation'=>'required'
        ]);
        // fin de la verification.

        //Renommage du fichier importer en un autre nom.
            $filename = time().'.UserImage.'.$request->avatar->extension();
        // stockage du fichier dans le dossier storrage
          $path = $request->avatar->storeAs(
            'UserImage',
            $filename,
            'public');
        //fin du stockage

        //verification du mot de passe avec sa confirmation.
        if ($request->password == $request->confirmer){
            $user = User::create([
            'name' => $request -> name,
            'email' => $request ->email,
            'password' => Hash::make($request -> password),
            'etat' => 0,
            'role_id'=>$request->role_id,
            'presentation'=>$request->presentation,
            ]);
        //enregistrement du nom du fichier dans la table Image.
            $profile = new Profile();
            $profile-> path = $path;
            $user -> profile()->save($profile);
            return response()->json($user);
        }else{
            //lorsque le mot de passe et la confirmation ne correspondent pas;
            dd('le mot de passe et la confirmation ne correspondent pas');
        }
    }
    // lien menant à la modification d'un utilisateur.
   public function Modifier_user($id)
    {
        // Renvoi automatique des informations dans le formulaire de modification
        $user = User::find($id);
        $roles = Role::all();
        return response()->json($user,$roles);
    }
    public function update_user($id,Request $request){
         // verification de la validation des données
         $validate =  $request->validate([
            'name' => ['required','min:3','max:20'],
            'email'=>'required',
            'presentation'=>'required'
        ]);
        // fin de la verification.

       // la modification proprement dite;
         $User = User::find($id);
         $User -> update([
            'name' => $request -> name,
            'email' => $request ->email,
            'presentation' => $request -> presentation,
            'role_id' => $request -> role_id
         ]);
         return response()->json($User);
    }
    public function delete_user($id){
        // la suppression d'un utilisateur.
      $user = User::find($id);
      $user->delete();
     // Affichage de la liste à nouveau
     return response()->json($user);
    }
    public function etatUser($id){
        if($etat == 0){
            $user = User::find($id);
            $user->update([
               'etat'=>1
            ]);
         }else{
            $user = User::find($id);
            $user->update([
               'etat'=>0
            ]);
         }
         return response()->json($user);
    }
    public function ModifierPassword($id){
        $user = User::find($id);
        return response()->json($user);
    }
    public function updatePassword($id)
    {
        $User = User::find($id);
        //verification du mot de passe et l'ancien mot de passe
        if( $User->password == $request->oldPassword)
        {

            //verification du mot de passe et la confirmation
                if($request->password == $request->confirmer)
                {

                        $User->update([
                        'password' =>hash::make( $request ->password),
                    ]);
                    return response()->json($User);

                }else{

                    dd('Le mot de passe et la confirmation ne correspondent pas');

                }
        }else{
                    dd('votre ancien mot de passe n\'est pas correct');
            }
    }
    public function createUserCompetence($id)
    {
         $user = User::find($id);
        $competences = Competence::all();
        return response()->json($user,$competences);
    }
    public function addUserCompetence($id,Request $request)
    {
        // dd($request);
        $user = User::find($id);
        // $competence = $request->competence_id;
        $user->competences()->attach($request->competence_id);
      return response()->json($user);
    }
    public function Detail_user($id){
        $user = User::with('competences')->find($id);
        return response()->json($user);
    }
    public function envoiMailUser($id)
    {
        $user = User::find($id);
        $envoiMail = Mail::to($user->email)->send(new EnvoiMarkdownMail());
        return response()->json(['message' => 'Mail envoyé avec succès sur l\'adresse '.$user->email],201);
    }
}
