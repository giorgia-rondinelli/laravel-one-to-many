@extends('admin.home')
@section('content')
<div class="container mt-4 ">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Tecnologie</th>
            <th scope="col">First</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($technologies as $technology )


        <tr>

            <td>{{$technology->name}}</td>
            <td>
                <ul>
                    @foreach ($technology->projects as $project )
                        <li><a class="text-black" href="{{route('admin.projects.show', $project)}}">{{$project->title}}</a></li>
                    @endforeach

                </ul>
            </td>


        </tr>
        @endforeach
        </tbody>
    </table>

</div>

@endsection
