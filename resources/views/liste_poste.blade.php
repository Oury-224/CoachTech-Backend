@extends('frontTemplate')

@section('content')

<div class="container">
    <div class="card" style="margin-bottom: 15px;">
        <div class="card-header">
            <h5>Liste des Postes
                <span>
                    <a href="{{Route('create_poste')}}" class="btn btn-primary">
                        <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
                        Nouvelle Poste
                    </a>
                </span>
            </h5>

        </div>
        <div class="card-body">
            @if ($posts->count() > 0)
                <table class='table table-striped table-bordered table-condensed table-responsive'>
                    <thead>
                        <th>Id</th>
                        <th>titre</th>
                        <th>contenu</th>
                        <th>Date création</th>
                        <th>Categorie</th>
                        <th>Path d'image</th>
                        <th>user</th>
                        <th colspan='2'>Actions</th>
                    </thead>
                    <tbody>
                        <!-- debut de l'iteration de la boucle au niveau des postes. -->
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $n = $n + 1 }}</td>
                        <td>{{$post->titre}}</td>
                        <td>
                            {!! Str::limit($post->contenu, 20, ' (...)') !!}
                        </td>
                        <td>{{$post->dateCreation}}</td>
                        <td>{{$post->categorie->nom}}</td>
                        <td>{{$post->image ? $post->image->path : "pas d'image"}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>
                          <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="posteMenuDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Executer</span>
                                 </a>
                                  <!-- Dropdown - User Information -->
                                 <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="posteMenuDropdown">
                                   <a class="dropdown-item" href="{{Route('ModifierPoste',['id'=>$post->id])}}">
                                      <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Modifier
                                   </a>
                                  <a class="dropdown-item" href="{{Route('SuppressionPoste',['id'=>$post->id])}}">
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
                <span>Il y a {{$posts->count()}} enregistrement(s) au niveau des postes. </span>
            @endif
        </div>
    </div>
</div>

@endsection
