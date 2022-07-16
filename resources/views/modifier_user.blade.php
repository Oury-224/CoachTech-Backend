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
            Modification d'un utilisateur
        </h5>
    </div>
    <form action="{{Route('UpdateUser',['id'=>$user->id])}}" method='POST' class='well'>
        @csrf
    <div class="card-body">
        <label class='form-label' for='role'>Roles</label>
        <select name="role_id" id="role" class='form-control'>
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->nom}}</option>
            @endforeach
        </select>
        <label class='form-label' for='name'>Name:</label>
        <input type="text" name="name" id='name' class="form-control" value="{{$user->name}}">

        <label class='form-label' for='email'>Email</label>
        <input type="email" name="email" id='email' class="form-control" value="{{$user->email}}">

        <label class="form-label" for='summary-ckeditor'>Présentation:</label>
        <textarea name="presentation" id="summary-ckeditor" cols="30" rows="10" class='form-control' placeholder="Veuillez presenter l'utilisateur SVP!">
            {{$user->presentation}}
        </textarea>
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
