@extends('frontTemplate')

@section('content')
    <div class="container">
        <div class="card" style="margin-bottom:15px">
            <div class="card-header">
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
                 <h5>
                    Modifier une categorie
                </h5>
            </div>
        <!-- la partie formulaire -->
        <form action="{{Route('UpdateCategorie',['id'=>$categorie->id])}}" method='POST' class='well'>
            <div class="card-body">
                @csrf
                <label class='form-label' for='nom'>Nom:</label>
                    <input type="text" name="nom" id='nom' class="form-control" value="{{ $categorie->nom}} ">
                <label class='form-label' for='date'>Date:</label>
                    <input type="date" name="date_creation" id='date' class="form-control" value="{{$categorie->date_creation}}">
            </div>
            <div class="card-footer">
                <button type="submit" value="Modifier" class='btn btn-primary'>
                    <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                    Modifier
                </button>
            </div>
        </form>
     </div>
 </div>
@endsection
