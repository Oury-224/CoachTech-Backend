<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        $categorie = Categorie::all()->sortByDesc('created_at');
        return response()->json($categorie);
    }
    public function create_Cat(){
        return response()->json();
    }
    public function add_Cat(Request $request){
        $validate =  $request->validate([
            'nom' => ['required','min:4','max:25'],
            'date_creation'=>'required'
        ]);
       $categorie = Categorie::create([
            'nom' => $request->nom,
            'date_creation' => $request->date_creation
        ]);
        return response()->json($categorie);
    }
    public function Modifier_Categorie($id){
        $categorie = Categorie::find($id);
        return response()->json($categorie);
    }
    public function updateCategorie($id,Request $request){
        $validate =  $request->validate([
            'nom' => ['required','min:4','max:25'],
            'date_creation'=>'required'
        ]);
        $cate = Categorie::find($id);
        $cate->update([
            'nom' => $request ->nom,
            'date_creation'=> $request -> date_creation
        ]);
        return response()->json($cate);
    }
    public function deleteCategorie($id)
    {
         $cate = Categorie::find($id);
         $cate->delete();
         return response()->json($cate);
    }
    

}
