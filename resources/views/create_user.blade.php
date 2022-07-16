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
    <!-- fin de la verification des informations -->
<div class="card" style="margin-bottom: 15px;">
    <div class="card-header">
        <h5>
            Ajout d'un utilisateur
        </h5>
    </div>
        <form action="{{ Route('Create_user') }}" method='POST' enctype='multipart/form-data'>
            @csrf
                <div class="card-body">
                    <label class='form-label' for='role'>Roles</label>
                    <select name="role_id" id="role" class='form-control'>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->nom}}</option>
                        @endforeach
                    </select>
                    <label class='form-label'for='name'>Name:</label>
                        <input type="text" name="name" id='name' class="form-control">

                    <label class='form-label' for='email'>Email:</label>
                        <input type="email" name="email" id='email' class="form-control">

                        <label class="form-label" for='summary-ckeditor'>Présentation:</label>
                        <textarea name="presentation" id="summary-ckeditor" cols="30" rows="10" class='form-control' placeholder="Veuillez presenter l'utilisateur SVP!">

                        </textarea>

                    <label class='form-label' for='password'>Mot de Passe:</label>
                        <input type="password" name="password" id='password' class="form-control">

                    <label class="form-label" for='confirmer'>Confirmer:</label>
                        <input type="password" name="confirmer" id='confirmer' class="form-control">
                     <label for="avatar">Choisissez une image de profile pour l'utilisateur</label>
                        <input type="file" name="avatar" id="avatar" class="form-control">
                    </div>
                <div class="card-footer">
                    <input type="submit" value="Ajouter" class='btn btn-primary'>
                </div>
            </form>
        </div>
</div>
@endsection
