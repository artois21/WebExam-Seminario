@extends('category.layout')

@section('content')
    <h1>Crear Category</h1>
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <div>
                {{$e}}
            </div>
        @endforeach
    @endif
    <form action="{{ route('category.store') }}" method="post"> <!--llamamos a la post.store que es la ruta post que se encarga de meter los datos-->
        @csrf <!-- ayuda a que la peticion sea segura-->
        <label for="">Titulo</label>
        <input type="text" name="title" value="{{old('title','Titulo de la categoria')}}">
        <label for="">Slug</label>
        <input type="text" name="slug" id="" value="{{old('slug','')}}">
        
        <button type="submit">Enviar</button>
    </form>
@endsection