@extends('frontTemplate')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card" style='margin-bottom:15px'>
            <div class="card-header">
                <h5>
                    Modification d'une compétence
                </h5>
            </div>
            <form action="{{Route('update_competence',['id'=>$competence->id ])}}" method='POST'>
                <div class="card-body">
                    @csrf
                    <label class='form-label' for='nom'>Nom</label>
                    <input type="text" name="nom" id='nom' class="form-control" value="{{$competence->nom}}">
                </div>
                <div class="card-footer">
                    <button type="submit" class='btn btn-primary'>
                        <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                        Modifier
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
