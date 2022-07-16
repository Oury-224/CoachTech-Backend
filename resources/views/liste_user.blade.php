@extends('frontTemplate')

@section('content')
<div class="container">
    <div class="card" style="margin-bottom: 15px;">
        <div class="card-header">
            <h5>Liste des utilisateurs
                <span>
                    <a href="{{ Route('CreateUser') }}" class="btn btn-primary">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Nouvel utilisateur
                    </a>
                </span>
            </h5>
        </div>
        <div class="card-body">
            @if ($users->count() > 0)
                <table class='table table-striped table-bordered
                                    table-condensed table-responsive'>
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Présentation</th>
                        <th>Email</th>
                        <th>Photo profile</th>
                        <th>etat</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <!-- debut de l\'iteration de la boucle utilisateur. -->
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $n = $n + 1 }}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->role->nom}}</td>
                            <td>
                                {!! Str::limit($user->presentation, 20, ' (...)') !!}
                            </td>
                            <td>{{$user->email}}</td>
                            <td>
                                <img src="{{$user->profile ?
                                 Storage::url($user->profile->path) : asset('img/undraw_profile.svg')}}"
                                 alt="" style="width:50px; height:50px">
                            </td>
                            <td>
                                @if($user->etat == 0)
                                    {{'Actif'}}
                                @else
                                    {{'Bloqué'}}
                                @endif
                            </td>
                            <td>
                             <ul class="navbar-nav ml-auto">
                               <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="userMenuDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Executer</span>
                                 </a>
                                  <!-- Dropdown - User Information -->
                                 <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userMenuDropdown">
                                   <a class="dropdown-item" href="{{ Route('ModifierUser',['id'=>$user->id])}}">
                                      <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Modifier
                                   </a>
                                  <a class="dropdown-item" href="{{ Route('delete_user',['id'=>$user->id])}}">
                                    <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Supprimer
                                  </a>
                                  <a class="dropdown-item" href="{{Route('ModifierPassword',['id'=>$user->id])}}">
                                    <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Modifier Password
                                  </a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="{{Route('etat_user',['id'=>$user->id,'etat'=>$user->etat])}}">
                                    <i class="fas fa-unlock fa-sm fa-fw mr-2 text-gray-400"></i>
                                        @if($user->etat == 0)
                                            {{'Bloqué'}}
                                        @else
                                            {{'DeBloqué'}}
                                        @endif
                                   </a>
                                   <a class="dropdown-item" href="{{ Route('create_user_competence',['id'=>$user->id])}}">
                                    <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                                       Ajout des compétences à un user
                                   </a>
                                   <a class="dropdown-item" href="{{ Route('details_user',['id'=>$user->id])}}">
                                    <i class="fas fa-list fa-fw mr-2 text-gray-400"></i>
                                       Détails
                                   </a>
                                   <a class="dropdown-item" href="{{ Route('envoiMailUser',['id'=>$user->id])}}">
                                    <i class="fas fa-envelope fa-fw mr-2 text-gray-400"></i>
                                       Envois d'un mail
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
                <span>Il y a {{$users->count()}} enregistrement(s) d'utilisateur </span>
            @endif
        </div>
    </div>
 </div>

@endsection
