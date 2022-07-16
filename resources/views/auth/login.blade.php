@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
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
                        <h1 class="h4 text-gray-900 mb-4">Bienvenue sur la page de Connexion</h1>
                    </div>
                    <form class="user" action="{{ Route('Authentification')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Entrer le nom d'utilisateur ..." name="pseudo">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user"
                                id="exampleInputPassword" placeholder="Mot de passe" name="password">
                        </div>
                        <button type="submit"  class="btn btn-primary btn-user btn-block">
                            Connexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
@endsection
