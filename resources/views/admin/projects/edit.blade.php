@extends('admin.home')
@section('content')
<div class="container">
    <h2>Modifica Progetto</h2>
    <form action="{{route('admin.projects.update', $project)}}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input name="title" value="{{old('title', $project->title) }}" type="text" class="form-control"  >

        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Technologia</label>
            <select name="technology_id" class="form-select" aria-label="Default select example">
                <option >seleziona un'opzione</option>
                @foreach ($technologies as $technology )


                <option @if (old('technology_id',$project->technology?->id)== $technology->id) selected @endif value="{{$technology->id}}">{{$technology->name}}</option>
               @endforeach
              </select>
            </div>
        <div class="mb-3">
        <label class="form-label">Linguaggio</label>
        <input value="{{old('languages', $project->languages) }}" type="text" class="form-control" >
        </div>
        <div class="mb-3">
        <label class="form-label">Stato </label>
        <input value="{{old('status', $project->status) }}" type="text" class="form-control" >
        </div>
        <div class="mb-3">
        <label class="form-label">Numero di commits </label>
        <input value="{{old('commits', $project->commits) }}" type="number" class="form-control" >
        </div>
        <div class="mb-3">
        <label class="form-label">Descrizione</label>
        <input value="{{old('description', $project->description) }}" class="form-control"  >
        </div>

        <button type="submit" class="btn btn-primary">Modifica</button>
    </form>
</div>
@endsection
