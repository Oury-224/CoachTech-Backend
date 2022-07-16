@extends('frontTemplate')

@section('content')
    <div class="container">
    <h4>
        <span>
            <a href="{{ Route('lisUser') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left fa-sm fa-fw mr-2 text-gray-400"></i>
                Retour à la liste
            </a>
        </span>
        Modification du Mot de passe
    </h4>
        <!-- Divider -->
        <hr class="sidebar-divider">
         <!-- verification de la valider des informations -->
            @if  ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <!-- fin de la verification des informations -->
        <form action="{{Route('updatePassword',['id'=>$user->id])}}" method='POST' class='well'>
        @csrf
        <div class="card" style="margin-bottom: 15px;">
            <div class="card-body">
                <label class='form-label' for='oldPassword'>Ancien Mot de passe:</label>
                <input type="password" name="oldPassword" id='oldPassword' class="form-control" value="{{$user->password}}">
                <hr class="sidebar-divider">
                <label class='form-label' for='password'>Nouveau Mot de passe</label>
                <input type="password" name="password" id='password' class="form-control">
                <label class='form-label' for='confirmer'>Confirmation du Mot de passe</label>
                <input type="password" name="confirmer" id='confirmer' class="form-control">
            </div>
            <div class="card-footer">
                <input type="submit" value="Modifier" class='btn btn-primary'>
            </div>
        </div>
    </form>

    </div>
@endsection
