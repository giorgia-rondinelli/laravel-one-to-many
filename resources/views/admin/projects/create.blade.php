@extends('admin.home')
@section('content')
<div class="container">

    @if ($errors->any())
<div role="alert" class="alert ">
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach ($errors->all() as $mess )
        <li>{{$mess}}</li>

        @endforeach

        </ul>
    </div>


</div>

@endif
    <h2>Crea Nuovo Progetto</h2>
    <form action="{{route('admin.projects.store',)}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input name="title" value="{{old('title') }}" type="text" class="form-control"  >

        </div>


        <div class="mb-3">
        <label for="image" class="form-label">Immagine</label>
        <input name="image" onchange="showimage(event)" value="{{old('image') }}" type="file" class="form-control"  >
        <img  class='w-25  mt-3' src="" id="thumb" alt="">

        </div>
        <div class="mb-3">
        <label for="title" class="form-label">Technologia</label>
        <select name="technology_id" class="form-select" aria-label="Default select example">
            <option >seleziona un'opzione</option>
            @foreach ($technologies as $technology )


            <option @if (old('technology_id')== $technology->id) selected @endif value="{{$technology->id}}">{{$technology->name}}</option>
           @endforeach
          </select>
        </div>
        <div class="mb-3">
        <label for="languages" class="form-label">Linguaggio</label>
        <input name="languages" value="{{old('languages',) }}" type="text" class="form-control" >
        </div>
        <div class="mb-3">
         <label  for="status"class="form-label">Stato </label>
            <select  name="status" class="form-select" >
                <option selected >scegli un'opzione</option>
                <option value="0">privato</option>
                <option value="1">pubblico</option>

              </select>


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

<script>
    function showimage(event){
        const thumb=document.getElementById('thumb');
        console.log(thumb);
        thumb.src= URL.createObjectURL(event.target.files[0])

    }
</script>
@endsection

{{-- funzione per creare preview --}}
{{-- function showImage(event){
    const thumb = document.getElementById('thumb');
    console.log(thumb);
    thumb.src = URL.createObjectURL(event.target.files[0]);
  } --}}
