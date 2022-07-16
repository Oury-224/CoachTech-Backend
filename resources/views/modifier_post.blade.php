@extends('frontTemplate')

@section('content')
        <div class="container">
            <div class="card" style="margin-bottom:15px">
                <div class="card-header">
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
                     <!-- fin de la verification des informations -->
                     <h5>
                        Modification de la Poste
                    </h5>
                </div>
        <form action="{{Route('update_poste',['id'=>$post->id])}}" method='POST'>
             <!-- debut du formulaire -->
            <div class="card-body">
                 @csrf
                    <label class='form-label' for='categorie'>Categorie</label>
                        <select name="categorie_id" id="categorie" class='form-control'>
                            @foreach($categ as $cat)
                                <option value="{{$cat->id}}">{{$cat->nom}}</option>
                            @endforeach
                        </select>
                    <label class='form-label' for='titre'>Titre du poste:</label>
                    <input type="text" name="titre" id='titre' class="form-control" value="{{$post->titre}}">

                    <label class='form-label' for='summary-ckeditor'>Contenu:</label>
                    <textarea name="contenu" id="summary-ckeditor" cols="15" rows="5" class='form-control'>
                        {{$post->contenu}}
                    </textarea>

                    <label class='form-label' for='date'>Date de Création</label>
                    <input type="date" name="dateC" id='date' Class="form-control" value="{{$post->dateCreation}}">
            </div>
            <!-- fin du formulaire -->
                <div class="card-footer">
                    <button type="submit" class='btn btn-primary'>
                        <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                        Modifier
                    </button>
                </div>
         </form>
     </div>
    </div>
@endsection
