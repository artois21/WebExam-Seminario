@extends('crud.layout')

@section('content')
    <h1>Index</h1>
    <a class="btn" href="{{route('post.create')}}">Crear</a>
    <table class="table">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Posteado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($datos as $d)
            <tr>
                <td>{{$d->title}}</td>
                <td>{{$d->category->title}}</td>
                <td>{{$d->posted}}</td>
                <td>
                    <a href="{{route('post.edit', $d)}}">Editar</a>
                    <a href="{{route('post.show', $d)}}">Ver</a>
                    <form action="{{route('post.destroy', $d)}}" method="post">
                        @method("DELETE")
                        @csrf
                        <button type="submit"> Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    {{$datos->links()}}
@endsection