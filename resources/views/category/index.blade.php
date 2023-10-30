@extends('category.layout')

@section('content')
    <h1>Index</h1>
    <a class="btn" href="{{route('category.create')}}">Crear</a>
    <table class="table">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Slug</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $d)
            <tr>
                <td>{{$d->title}}</td>
                <td>{{$d->slug}}</td>
                <td>
                    <a href="{{route('category.edit', $d)}}">Editar</a>
                    <a href="{{route('category.show', $d)}}">Ver</a>
                    <form action="{{route('category.destroy', $d)}}" method="post">
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