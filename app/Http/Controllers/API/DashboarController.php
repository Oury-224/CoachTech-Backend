<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboarController extends Controller
{
    public function __invoke(){
        $users = User::count();
        $posts = Post::count();
        $comments = Comment::count();
        $categories = categorie::count();
        return response()->json($users,$posts,$comments,$categories);
    }
}
