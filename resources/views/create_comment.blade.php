@extends('frontTemplate')

@section('content')
    <div class="container">
        <div class="card" style="margin-bottom: 15px;">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="card-header">
            <h5>
                Nouveau Commentaire
            </h5>
        </div>
            <!-- fin de la verification des informations -->
        <form action="{{Route('add_comment')}}" method='POST'>
            <div class="card-body">
                @csrf
                <label class='form-label' for='post'>Poste:</label>
                <select name="post_id" id="post" class='form-control'>
                    @foreach($posts as $post)
                        <option value="{{$post->id}}">{{$post->titre}}</option>
                    @endforeach
                </select>
                <label class='form-label' for='summary-ckeditor'>Contenu:</label>
                <textarea name="contenu" id="summary-ckeditor" cols="30" rows="10" class='form-control'></textarea>
                <label class='form-label' for='date'>Date de Création du Commentaire:</label>
                <input type="date" name="dateC" id='date' Class="form-control">
            </div>
            <div class="card-footer">
                <button type="submit" value="Ajouter" class='btn btn-primary'>
                    <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                    Ajouter
                </button>
            </div>
        </form>
     </div>
</div>
@endsection
