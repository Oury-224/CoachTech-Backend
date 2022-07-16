<?php

namespace App\Http\Controllers;
use App\Models\Categorie;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;

class CategorieController extends Controller
{
    public function index(){
        $categorie = Categorie::all()->sortByDesc('created_at');
        $n = 0;
        return view('categorie',compact('categorie','n'));
    }
    // Ajout d'une categorie.
    public function create_Cat(){
        return view('create_categorie');
    }
    public function add_Cat(Request $request){
       $validate =  $request->validate([
            'nom' => ['required','min:4','max:25'],
            'date_creation'=>'required'
        ]);
        Categorie::create([
            'nom' => $request->nom,
            'date_creation' => $request->date_creation
        ]);
        return redirect()->route('categorie')
                         ->with('success',"Ajout effectué avec succès");
    }
    //lien menant à la modification d'une categorie.
    public function Modifier_Categorie($id){
        $categorie = Categorie::find($id);
        return view('Modifier_categorie',compact('categorie'));
    }
    //la modification proprement dite.
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
            // Retour à la liste général de la categorie.
            return redirect()->route('categorie')
                             ->with('success',"Modification effectuée avec succès");
    }
    //la suppression d'une categorie.
    public function deleteCategorie($id){
        //suppression de la categorie.
        $cate = Categorie::find($id);
        $cate->delete();
        // Retour à la liste général de la categorie.
        return redirect()->route('categorie')
                         ->with('success',"Suppression effectuée avec succès");
    }
}

