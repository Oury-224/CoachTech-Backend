@extends('frontTemplate')

@section('content')

     <!-- Begin Page Content -->
     <div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tableau de Bord</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Génération du Rapport</a>
</div>
<!-- Content Row -->
<div class="row">
    <!-- Users -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <a href="{{Route('lisUser')}}">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Utilisateurs
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
          </a>
        </div>
    </div>
    <!-- categorie  -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <a href="{{Route('categorie')}}">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Catégories
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$categories}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
          </a>
        </div>
    </div>
    <!-- Postes  -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <a href="{{Route('ListPoste')}}">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Postes
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$posts}}</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
          </a>
        </div>
    </div>

    <!-- Comments -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <a href="{{Route('lisCom')}}">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Commentaires
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$comments}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
      </a>
    </div>
</div>
<div class="row">
     <!-- Competences  -->
     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2" style='text-align:justify;'>
          <a href="{{Route('listCompetence')}}">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            compétences
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$competences}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
          </a>
          <div class="container">
            <span class="text-success">Définition:</span> Connaissance approfondie, reconnue, qui confère le droit de juger ou de décider en certaines matières.
            <span class="text-success">Importances:</span> Une compétence est la capacité de produire un résultat désiré. Sans compétences, les simples connaissances
            ne servent pas à grand-chose. Vous pouvez, par exemple, comprendre toutes les données et tous les termes contenus dans
            un rapport annuel quelconque. Aujourd'hui, le concept de compétences ne renvoie pas uniquement aux compétences cognitives
            .
          </div>
        </div>
    </div>
    {{-- fin de la partie competence --}}
</div>

@endsection
