@extends('frontTemplate')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>
                    <span>
                        <a href="{{ Route('lisUser') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left fa-sm fa-fw mr-2 text-gray-400"></i>
                            Retour à la liste
                        </a>
                    </span>
                    Détail d'un utilisateur
                </h3>
            </div>

            <div class="card-body">

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Les Informations sur l'utitisateur</legend>
                    <div class="row" style="margin-bottom:5px">
                      <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">Nom: {{$user->name}}</div>
                            </div>
                      </div>
                      <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">Rôle: {{$user->role->nom}}</div>
                            </div>
                      </div>
                      <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Email: {{$user->email}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="card">
                                <div class="card-header">Sa Présentation:</div>
                                <div class="card-body">{{$user->presentation}}</div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Les compétences attribuées à l'utilisateur sont: </legend>
                        @if($user->competences->count() > 0)
                            @foreach($user->competences as $competence)
                                <div class="control-group" style="margin-bottom:5px">
                                    <div class="card">
                                        <div class="card-header" style="margin-bottom:5px">
                                        <span>{{ $n += 1 }})</span>    <span>{{ $competence->nom }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        <span>Aucune competence n'est attribuée à cet utilisateur.</span>
                        @endif
                </fieldset>
            </div>

        </div>
    </div>
@endsection
