<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Profile;
use App\Models\Competence;
use Illuminate\Http\Request;
use App\Mail\EnvoiMarkdownMail;
use App\Models\Competence_User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UserController;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
   public function index()
   {
    $n = 0;
    $users = User::with('profile')->get()->sortByDesc('created_at');
    return view('liste_user',compact('users','n'));
   }
   //lien pour la creation d'un utilisateur
   public function create_user()
   {
      $roles = Role::all();
      return  view('create_user',compact('roles'));
   }
   //ajout d'un utilisateur
   public function add_user(Request $request)
   {
       // verification de la validation des données
       $validate =  $request->validate([
         'name' => ['required'],
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

         return redirect()->route('lisUser')
                          ->with('success',"Ajout effectué avec succès");
      }else{
         //lorsque le mot de passe et la confirmation ne correspondent pas;
         return redirect()->route('CreateUser')
                          ->with('error',"le mot de passe et la confirmation ne correspondent pas");

      }
   }
   // lien menant à la modification d'un utilisateur.
   public function Modifier_user($id)
   {
      // Renvoi automatique des informations dans le formulaire de modification
      $user = User::find($id);
      $roles = Role::all();
      return view('modifier_user',compact('user','roles'));
   }
   // la modification proprement dite d'un utilisateur.
   public function update_user($id,Request $request)
   {
      //   verification de la validation des données
         $validate =  $request->validate([
            'name' => ['required'],
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
         return redirect()->route('lisUser')
                          ->with('success',"Modification effectuée avec succès");
   }
   public function ModifierPassword($id)
   {
      $user = User::find($id);
      return view('Modifier_password_user',compact('user'));
   }
   public function updatePassword($id, Request $request)
   {
     $User = User::find($id);
     //verification du mot de passe et l'ancien mot de passe
     if( $User->password == $request->oldPassword){
         //verification du mot de passe et la confirmation
      if($request->password == $request->confirmer){
            $User->update([
                         'password' =>hash::make( $request ->password),
                        ]);
         return redirect()->route('lisUser')
                        ->with('success',"Mot de passe Modifié avec succès");
         }else{
            return redirect()->route('ModifierPassword')
                             ->with('error',"le mot de passe et la confirmation ne correspondent pas");
         }
     }else{
             return redirect()->route('ModifierPassword')
                             ->with('error',"votre ancien mot de passe n'est pas correct");
     }
   }
   // la suppression d'un user.
   public function delete_user($id)
   {
      // la suppression d'un utilisateur.
      $user = User::find($id);
      $user->delete();
     // Affichage de la liste à nouveau
     return redirect()->route('lisUser')
                      ->with('success',"Utilisateur supprimé avec succès");
   }
   // l'etat de l'utilisateur.
   public function etatUser($id,$etat)
   {
      if($etat == 0){
         $user = User::find($id);
         $user->update([
            'etat'=>1
         ]);
          //affichage de la liste user.
            return redirect()->route('lisUser')
                             ->with('error',"Utilisateur Bloqué avec succès");
      }else{
         $user = User::find($id);
         $user->update([
            'etat'=>0
         ]);
         //affichage de la liste user.
         return redirect()->route('lisUser')
                       ->with('success',"Utilisateur Débloqué avec succès");
      }
   }
   // Ajout des competences à un utilisateur.
   public function createUserCompetence($id)
   {
      $user = User::find($id);
      $competences = Competence::all();
      return view('createUserCompetence',compact('user','competences'));
   }
   //Ajout proprement dite des competences.
   public function addUserCompetence($id,Request $request)
   {
      // dd($request);
      $user = User::find($id);
      // $competence = $request->competence_id;
      $user->competences()->attach($request->competence_id);
        //affichage de la liste user.
        return redirect()->route('lisUser')
                         ->with('success',"Les compétences sont attribuées à l'utilisateur avec succès");
   }
   public function Detail_user($id)
   {
         $user = User::with('competences')->find($id);
         $n = 0;
         return view('detailUserCompetance',compact('user','n'));
   }
   public function envoiMailUser($id)
   {
        $user = User::find($id);
        Mail::to($user->email)->send(new EnvoiMarkdownMail());
          //affichage de la liste user.
        return redirect()->route('lisUser')
                         ->with('success',"Mail envoyé avec succès");
   }
}
