<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
   public function index(){
        $posts = Post::with('image','user')->get()->sortByDesc('created_at');
        $categ = Categorie::all()->sortByDesc('created_at');
        $n = 0;
        return view('liste_poste',compact('posts','n','categ'));
   }
   public function create_poste(){
    $categ = Categorie::all()->sortByDesc('created_at');
    return view('create_poste',compact('categ'));
   }
   public function add_poste(Request $request)
   {
    // verification de la validation des données
      $validate =  $request->validate([
       'titre' => ['required'],
       'contenu'=>['required'],
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
      $user_id = Auth::user()->id;
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
     return redirect()->route('ListPoste')
                      ->with('success',"Ajout effectué avec succès");;
   }
   public function Modifier_Poste($id){
    $categ = Categorie::all()->sortByDesc('created_at');
    $post = Post::find($id);
    return view('modifier_post',compact('post','categ'));
   }
   public function updatePoste($id,Request $request){
    //  verification des données du poste
        $validate =  $request->validate([
          'titre' => ['required'],
          'contenu'=>['required'],
          'dateC'=>'required',
          'categorie_id'=>'required'
        ]);
        //fin de la verification
        //Enregistrement des données
       $user_id = Auth::user()->id;
       $post = Post::find($id);
       $post->update([
            'titre' => $request -> titre,
            'contenu' => $request ->contenu,
            'dateCreation' => $request -> dateC,
            'categorie_id'=>$request->categorie_id,
            'user_id'=> $user_id
         ]);
         //fin de l'enregistrement dans le BD.
         return redirect()->route('ListPoste')
                          ->with('success',"Modification effectuée avec succès");
   }
   public function deletePoste($id){
       $post= Post::find($id);
       $post->delete();
       return redirect()->route('ListPoste')
                        ->with('success',"Suppression effectuée avec succès");
   }
 //
}
