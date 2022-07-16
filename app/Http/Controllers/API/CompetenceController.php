<?php

namespace App\Http\Controllers\API;

use App\Models\Competence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompetenceController extends Controller
{
   public function index(){
    $competences = Competence::all()->sortByDesc('created_at');
     return response()->json($competences);
   }
   public function create_competence(){
    return response()->json();
   }
   public function add_competence(Request $request){
        $validate =  $request->validate([
            'nom' => ['required','min:3','max:50']
        ]);
        //creation d'une competence.
       $competence = Competence::create([
            'nom' => $request -> nom]);
        //la liste des competences.
         return response()->json($competence);
   }
   public function ModifierCompetence($id){
    $competence = Competence::find($id);
    return response()->json($competence);
   }
   public function update_competence($id,Request $request){
      //la validation des données.
      $validate =  $request->validate(['nom' => ['required']]);
      //modification d'une competence.
      $competence = Competence::find($id);
      $competence->update([
          'nom' => $request -> nom]);
      //fin de la modification

      //la liste des competences.
      return response()->json($competence);
   }
   public function deleteCompetence($id){
        $competence = Competence::find($id);
        $competence->delete();
        return response()->json($competence);
   }
}

