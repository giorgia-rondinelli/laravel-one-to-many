@extends('admin.home')
@section('content')
<div class="container pt-4 ">

    <table class="table table-dark table-striped">
            <thead>
                <tr>


                <th scope="col">Titolo</th>
                <th scope="col">Linguaggio </th>
                <th scope="col">Stato</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($projects as $project )


                <tr>


                <td> <a href="{{route('admin.projects.show', $project)}}"><i class="fa-solid fa-circle-info"></i> </a>{{$project->title}}</td>
                <td>{{$project->languages}}</td>
                @if ($project->status)
                    <td>pubblico</td>
                @else
                    <td>privato</td>
                @endif

                </tr>
                @endforeach
            </tbody>

        </table>

</div>

@endsection
