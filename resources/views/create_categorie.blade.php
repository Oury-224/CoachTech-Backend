@extends('frontTemplate')

@section('content')

    <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ Route('addCate')}}" method='POST'>
                <div class="card" style="margin-bottom: 15px;">
                    <div class="card-header">
                        <h5>
                             Ajout d'une categorie
                        </h5>
                    </div>
                    <div class="card-body">
                        @csrf
                        <label class='form-label' for='nom'>Nom:</label>
                        <input type="text" name="nom" id='nom' class="form-control" placeholder="Veuillez saisir le nom de la categorie Svp!">
                        <label class='form-label' for='date'>Date de Création de la Categorie</label>
                        <input type="date" name="date_creation" id='date' Class="form-control">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class='btn btn-primary'>
                            <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                            Ajouter
                        </button>
                    </div>
                </div>
        </form>
    </div>
@endsection
