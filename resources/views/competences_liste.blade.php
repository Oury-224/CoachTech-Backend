@extends('frontTemplate')

@section('content')
    <div class="container">
        <div class="card" style="margin-bottom: 15px;">
            <div class="card-header">
                <h5>Liste des compétences
                    <span>
                        <a href="{{Route('CreateCompetene')}}" class="btn btn-primary">
                            <i class="fas fa-inbox fa-sm fa-fw mr-2 text-gray-400"></i>
                            Nouvelle compétence
                        </a>
                    </span>
                </h5>
            </div>
            <div class="card-body">
                @if($competences->count() > 0)
                <table class='table table-striped table-condensed table-responsive'>
                    <thead>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <!-- debut de l'iteration de la boucle au niveau des postes. -->
                    @foreach($competences as $competence)
                    <tr>
                        <td>{{ $n = $n + 1 }}</td>
                        <td>{{$competence->nom}}</td>
                        <td>

                            <ul class="navbar-nav ml-auto">
                               <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="userMenuDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Executer</span>
                                 </a>
                                  <!-- Dropdown - User Information -->
                                 <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userMenuDropdown">
                                   <a class="dropdown-item" href="{{Route('ModifierCompetence',['id'=>$competence->id])}}">
                                      <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Modifier
                                   </a>
                                  <a class="dropdown-item" href="{{Route('SuppressionCompetence',['id'=>$competence->id])}}">
                                    <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Supprimer
                                  </a>
                                </div>
                               </li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                        <!-- fin l'iteration de la boucle utilisateur. -->
                    </tbody>
                </table>
                @else
                    <div>Il y a {{$competences->count()}} enregistrement(s) au niveau des compétences</div>
                @endif
            </div>
        </div>
    </div>

@endsection
