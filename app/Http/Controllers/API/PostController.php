<?php

namespace App\Http\Controllers\API;

use App\Models\Image;
use App\Models\categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('image','user')->get()->sortByDesc('created_at');
        $categ = categorie::all()->sortByDesc('created_at');
        return response()->json('posts','categ');
    }
    public function create_poste(){
        $categ = Categorie::all()->sortByDesc('created_at');
        return response()->json($categ);
    }
    public function add_poste(Request $request){

        // verification de la validation des données
      $validate =  $request->validate([
        'titre' => ['required','min:3','max:50'],
        'contenu'=>['required','min:7','max:255'],
        'dateC'=>'required',
        'categorie_id'=>'required'
       ]);
      // fin de la verification.

     //Renommage du fichier importer en un autre nom.
     $filename = time().'.PosteImage.'.$request->avatar->extension();

     // stockage du fichier dans le dossier storrage
      $path = $request->avatar->storeAs(
         'PosteImage',
         $filename,
         'public');

        //creation d'un poste
        $user_id = 1;
       $post = Post::create([
         'titre' => $request -> titre,
         'contenu' => $request ->contenu,
         'dateCreation' => $request -> dateC,
         'categorie_id' =>$request -> categorie_id,
         'user_id' => $user_id
      ]);

      //enregistrement du nom du fichier dans la table Image.
          $image = new Image();
          $image-> path = $path;

          $post -> image()->save($image);
        //la liste des postes.
      return response()->json($post);
    }
    public function Modifier_Poste($id){
        $categ = Categorie::all()->sortByDesc('created_at');
        $post = Post::find($id);
        return response()->json($categ,$post);
    }
    public function updatePoste($id,Request $request){
         //  verification des données du poste
         $validate =  $request->validate([
            'titre' => ['required','min:3','max:50'],
            'contenu'=>['required','min:7','max:255'],
            'dateC'=>'required',
            'categorie_id'=>'required'
          ]);
          //fin de la verification
          //Enregistrement des données
          $user_id = 1;
          $post = Post::find($id);
          $post->update([
              'titre' => $request -> titre,
              'contenu' => $request ->contenu,
              'dateCreation' => $request -> dateC,
              'categorie_id'=>$request->categorie_id,
              'user_id'=> $user_id
           ]);
           //fin de l'enregistrement dans le BD.
           return response()->json($post);
    }
    public function deletePoste($id){
       $post= Post::find($id);
       $post->delete();
       return response()->json($post);
    }
}
