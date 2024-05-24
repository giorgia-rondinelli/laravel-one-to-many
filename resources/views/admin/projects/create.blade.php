@extends('admin.home')
@section('content')
<div class="container">
    <h2>Crea Nuovo Progetto</h2>
    <form action="{{route('admin.projects.store',)}}" method="POST">
        @csrf

        <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input name="title" value="{{old('title') }}" type="text" class="form-control"  >

        </div>
        <div class="mb-3">
        <label for="languages" class="form-label">Linguaggio</label>
        <input name="languages" value="{{old('languages',) }}" type="text" class="form-control" >
        </div>
        <div class="mb-3">
        <label  for="status"class="form-label">Stato </label>
        <input name="status" value="{{old('status',) }}" type="text" class="form-control" >
        </div>
        <div class="mb-3">
        <label  for="commits" class="form-label">Numero di commits </label>
        <input name="commits" value="{{old('commits') }}" type="number" class="form-control" >
        </div>
        <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <input name="description" value="{{old('description') }}" class="form-control"  >
        </div>

        <button type="submit" class="btn btn-primary">Aggiungi </button>
    </form>
</div>
@endsection

{{-- funzione per creare preview --}}
{{-- function showImage(event){
    const thumb = document.getElementById('thumb');
    console.log(thumb);
    thumb.src = URL.createObjectURL(event.target.files[0]);
  } --}}
