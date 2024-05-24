@extends('admin.home')
@section('content')
<div class="container mt-5 ">
    <h1>Tipologie</h1>
    <div class="row">
        <div class="col-4">
            @if (session('error'))

                <div class="alert alert-danger" role="alert">
                   {{session('error')}}
                  </div>
            @endif

            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                {{$error}}
               </div>
            @endforeach


            @endif
            @if (session('success'))

            <div class="alert alert-success" role="alert">
               {{session('success')}}
              </div>
            @endif

            @if (session('deleted'))
              <div class="alert alert-primary" role="alert">
                 {{session('deleted')}}
              </div>


            @endif





            <form action="{{route('admin.type.store')}}" method="POST">
            <div class="input-group mb-3">

                @csrf
                <input name="name" type="text" class="form-control"   aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Aggiungi</button>

              </div>
            </form>




            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">Nome</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type )


                <tr>

                    <td>
                        <form action="{{route('admin.type.update', $type )}}" method="POST" id="form-edit-{{$type->id}}" name="name">
                            @csrf
                            @method('PUT')
                            <input class="iput-sc" type="text" name="name" id="" value="{{$type->name}}">
                        </form>
                    </td>
                    <td>
                        <button onclick="submitForm({{$type->id}})" class="btn btn-warning "><i class="fa-solid fa-pencil"></i></button>
                    </td>
                    <td>
                        <form action="{{route('admin.type.destroy',$type)}}" method="POST" onsubmit="return confirm('sei sicuro di voler eliminare'{{$type->name}})">
                            @csrf
                            @method('delete ')
                            <button type="submit" class="btn btn-danger "><i class="fa-regular fa-trash-can"></i></button>
                        </form>

                    </td>

                </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>
<script>

    function submitForm(id){
        const form=document.getElementById(`form-edit-${id}`);
        form.submit();


    }
</script>

@endsection
