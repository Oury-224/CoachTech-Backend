<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\categorie;
use App\Models\Competence;
use Illuminate\Http\Request;

class DashboarController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $users = User::count();
        $posts = Post::count();
        $comments = Comment::count();
        $categories = categorie::count();
        $competences = Competence::count();
        return view('tableauBord',compact('users','posts','comments','categories','competences'));
    }
}
