@extends('admin.home')
@section('content')

<div class="container mt-4 ">
    <h1>{{$project->title}}</h1>
    <div class="d-flex justify-content-between ">
        <p>Data di creazione: {{$project->created_at}}</p>
        @if ($project->status)
        <p class="badge text-bg-primary ">Pubblico</p>
        @else
        <p class="badge text-bg-primary ">Privato</p>
        @endif

    </div>

    <h4>Descrizione:</h4>
    <div class="mb-4">{{$project->description}}</div>
    <h4>Linguaggio</h4>
    <div>{{$project->languages}}</div>

    <button class="btn btn-warning mt-5"><a class="modifica" href="{{route('admin.projects.edit', $project)}}">Modifica</a> </button>
    <form action="{{route('admin.projects.destroy' ,$project)}}" method="POST">
        @csrf
        @method('delete')

        <button type="submit" class="btn btn-danger mt-5">Elimina </button>
    </form>





</div>
@endsection
