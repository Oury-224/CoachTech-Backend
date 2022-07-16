<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //liste des commentaires
    public function index(){
        $comments = Comment::with('post','user')->get()->sortByDesc('created_at');
        $n = 0;
        return view('list_commen',compact('comments','n'));
    }
    //Ajout d'un commentaire.
    public function create_comment(){
        $posts = Post::all()->sortByDesc('created_at');
        return view('create_comment',compact('posts'));
    }
    public function add_comment(Request $request){
        // verification de la validation des informations.
        $validate =  $request->validate([
            'contenu'=>['required'],
            'dateC'=>'required',
            'post_id'=>'required'
          ]);
          // fin de la verification.
        //enregistrement des informations dans la BD
        $user_id = Auth::user()->id;
        Comment::create([
            'contenu' => $request->contenu,
            'dateCreation'=>$request->dateC,
            'post_id'=>$request->post_id,
            'user_id'=>$user_id
        ]);
        //fin de l'enregistrement

        //Affichage de la vue.
        return redirect()->route('lisCom')
                         ->with('success',"Ajout effectué avec succès");
    }
    //Modification d'un commentaire
    public function Modifier_Comment($id){
        $postes = Post::all()->sortByDesc('created_at');
        $comments = Comment::find($id);
        return view('modifier_Comment',compact('comments','postes'));
    }
    public function updateComment($id,Request $request){
        // verification de la validation des informations.
        $validate =  $request->validate([
            'contenu'=>['required'],
            'dateC'=>'required',
            'post_id'=>'required'
          ]);
          // fin de la verification.
          //modification d'un commentaire dans le BD.
        $user_id = Auth::user()->id;
        $comment = Comment::find($id);
        $comment->update([
            'contenu' => $request->contenu,
            'dateCreation'=>$request->dateC,
            'post_id'=>$request->post_id,
            'user_id'=>$user_id
        ]);
         //Affichage de la vue.
         return redirect()->route('lisCom')
                          ->with('success',"Modification effectuée avec succès");
    }
    public function deleteComment($id)
    {
        $comments = Comment::find($id);
        $comments->delete();

        return redirect()->route('lisCom')
                         ->with('success',"Suppression effectuée avec succès");
    }
}
