@extends('frontTemplate')

@section('content')
    <div class="container">
        <div class="card" style="margin-bottom:15px">
            <div class="card-header">
                <h5>Liste des categories
                    <span>
                        <a href="{{Route('CreateCate')}}" class="btn btn-primary">
                            <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                            Nouvelle Categorie
                        </a>
                    </span>
                </h5>
            </div>
            <div class="card-body">
                    <!-- verification du nombre de categorie dans la base de données -->
                @if($categorie->count() > 0)
                    <!-- liste les enregistrements de la categorie dans une boucle -->
                        <table class='table table-striped table-condensed table-responsive'>
                            <thead>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Date de Création</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                            @foreach($categorie as $cat)
                                <tr>
                                    <td>{{ $n = $n + 1 }}</td>
                                    <td>{{ $cat->nom }}</td>
                                    <td>{{ $cat->date_creation }}</td>
                                    <td>
                                      <ul class="navbar-nav ml-auto">
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="posteMenuDropdown" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Executer</span>
                                                </a>
                                                <!-- Dropdown - User Information -->
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="posteMenuDropdown">
                                                    <a class="dropdown-item" href="{{Route('ModifierCateg',['id'=>$cat->id])}}">
                                                        <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            Modifier
                                                    </a>
                                                    <a class="dropdown-item" href="{{ Route('deleteCategorie',['id'=>$cat->id])}}">
                                                        <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            Supprimer
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <!-- fin de la liste des categorie -->
                @else
                 <span>Il y a {{$categorie->count()}} enregistrement(s) d'utilisateur </span>
                @endif
            </div>
        <!-- fin de la verification du nombre dans le Bd -->
    </div>
 </div>

@endsection
