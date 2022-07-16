<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    public function index(){
        $competences = Competence::all()->sortByDesc('created_at');
       $n = 0;
        return view('competences_liste',compact('competences','n'));
    }
    public function create_competence(){
        return view('create_competence');
    }
    public function add_competence(Request $request){
        $validate =  $request->validate(['nom' => ['required','min:3','max:50'],]);
        //creation d'une competence.
        Competence::create([
            'nom' => $request -> nom]);
        //la liste des competences.
     return redirect()->route('listCompetence')
                      ->with('success',"Ajout effectué avec succès");
    }
    public function ModifierCompetence($id){
        $competence = Competence::find($id);
        return view('modifier_competence',compact('competence'));
    }
    public function update_competence(Request $request, $id){
        //la validation des données.
        $validate =  $request->validate(['nom' => ['required']]);
        //modification d'une competence.
        $competence = Competence::find($id);
        $competence->update([
            'nom' => $request -> nom]);
        //fin de la modification

        //la liste des competences.
        return redirect()->route('listCompetence')
                         ->with('success',"Modification effectuée avec succès");
    }
    public function deleteCompetence($id){
        //suppression de la competance
        $competence = Competence::find($id);
        $competence->delete();
        //Retour à la liste
        return redirect()->route('listCompetence')
                         ->with('success',"Suppression éffectuée avec succès");;
    }
    //
}
