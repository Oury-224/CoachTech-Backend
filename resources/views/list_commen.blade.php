@extends('frontTemplate')

@section('content')
<div class="container">
    <div class="card" style="margin-bottom: 15px;">
        <div class="card-header">
            <h5>Liste des Commentaires
                <a href="{{Route('Create_commen')}}" class="btn btn-primary">
                    <i class="fas fa-comment fa-sm fa-fw mr-2 text-gray-400"></i>
                        Nouveau commmentaire
                </a>
            </h5>
        </div>
        <div class="card-body">
            @if ($comments->count() > 0)
                <table class='table table-striped table-bordered table-condensed table-responsive''>
                    <thead>
                        <th>Id</th>
                        <th>Contenu</th>
                        <th>Date Création</th>
                        <th>Postes</th>
                        <th>User</th>
                        <th colspan='2' class="text-center">Actions</th>
                    </thead>
                    <tbody>
                        <!-- debut de l'iteration de la boucle au niveau des postes. -->
                    @foreach($comments as $comment)
                    <tr>
                        <td>{{ $n = $n + 1 }}</td>
                        <td>
                            {!! Str::limit($comment->contenu, 20, ' (...)') !!}
                        </td>
                        <td>{{$comment->dateCreation}}</td>
                        <td>{{$comment->post->titre}}</td>
                        <td>{{ $comment->user ? $comment->user->name : '' }}</td>
                        <td>

                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="commentMenuDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Executer</span>
                                 </a>
                                  <!-- Dropdown - User Information -->
                                 <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="commentMenuDropdown">
                                   <a class="dropdown-item" href="{{Route('ModifierComment',['id'=>$comment->id])}}">
                                      <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Modifier
                                   </a>
                                   <a class="dropdown-item" href="{{Route('SuppressionComment',['id'=>$comment->id])}}">
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
                <span>Il y a aucun enregistrement au niveau des commentaires. </span>
            @endif
        </div>
    </div>
</div>

@endsection
