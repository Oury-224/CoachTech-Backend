@extends('frontTemplate')

@section('content')

    <div class="container">
        <div class="card" style="margin-bottom:15px">
            <div class="card-header">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h5>
                    Modification du Commentaire
                </h5>
            </div>
        <form action="{{Route('updateComment',['id'=>$comments->id])}}" method='POST' >
            <div class="card-body">
                @csrf
                <label class='form-label' for='post'>Poste:</label>
                <select name="post_id" id="post" class='form-control'>
                    @foreach($postes as $post)
                        <option value="{{$post->id}}">{{$post->titre}}</option>
                    @endforeach
                </select>

                <label class='form-label' for='summary-ckeditor'>Contenu:</label>
                <textarea name="contenu" id="summary-ckeditor" cols="15" rows="3" class='form-control'>
                    {{ $comments->contenu }}
                </textarea>

                <label class='form-label' for='date'>Date de Création</label>
                <input type="date" name="dateC" id='date' Class="form-control" value="{{$comments->dateCreation}}">
            </div>
            <div class="card-footer">
                <button type="submit" class='btn btn-primary' style='margin-bottom:10px'>
                    <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                    Modifier
                </button>
            </div>
        </form>
     </div>
</div>
@endsection
