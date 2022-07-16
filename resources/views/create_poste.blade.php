@extends('frontTemplate')

@section('content')

<div class="container">
     <!-- verification de la valider des informations -->
     @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card" style="margin-bottom: 15px;">
        <div class="card-header">
            <h5>
                Nouvelle Poste
            </h5>
        </div>
        <form action="{{Route('add_poste')}}" method='POST' enctype='multipart/form-data'>
            <div class="card-body">
                @csrf
                <label class='form-label' for='categorie'>Categorie</label>
                <select name="categorie_id" id="categorie" class='form-control'>
                    @foreach($categ as $cat)
                        <option value="{{$cat->id}}">{{$cat->nom}}</option>
                    @endforeach
                </select>
                <label class='form-label' for='titre'>Titre du poste:</label>
                <input type="text" name="titre" id='titre' class="form-control">
                <label class='form-label' for='summary-ckeditor'>Contenu:</label>
                <textarea name="contenu" id="summary-ckeditor" cols="30" rows="10" class='form-control'></textarea>
                <label class='form-label' for='date'>Date de Création du Poste</label>
                <input type="date" name="dateC" id='date' Class="form-control">
                <label for="avatar">Choisissez une image pour le poste</label>
                <input type="file" name="avatar" id="avatar" class="form-control">
            </div>
            <div class="card-footer">
                <button type="submit" class='btn btn-primary'>
                    <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                    Ajouter
                </button>
            </div>
        </form>
     </div>
  </div>
</div>





@endsection
