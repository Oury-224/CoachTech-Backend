@extends('frontTemplate')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>
                    Ajout des compétences à un utilisateur
                </h3>
            </div>
        <form action="{{ Route('addUserCompetence',['id'=>$user->id]) }}" method="POST">
            <div class="card-body">
                @csrf
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
                    <legend class="scheduler-border">Liste des compétences à attribuer à l'utilisateur</legend>
                  @forelse($competences as $competence)
                    <div class="control-group">
                        <div class="form-check">
                            <input class="form-check-input" id='NomCompetence' name='competence_id[]' value="{{ $competence->id }}" type="checkbox" value="">
                            <label class="form-check-label" for="NomCompetence">
                                 {{ $competence->nom }}
                            </label>
                        </div>
                    </div>
                 @empty
                     <span>Il y a {{$competences->count()}} enregistrement(s) au niveau des competences.</span>
                 @endforelse
                </fieldset>
            </div>
            <div class="card-footer">
                <input type="submit" value="Ajouter" class="btn btn-primary">
            </div>
        </form>
        </div>
    </div>
@endsection
