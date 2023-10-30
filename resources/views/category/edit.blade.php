@extends('category.layout')

@section('content')
    <h1>Actualizar Categoria {{$category->title}}</h1>
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <div>
                {{$e}}
            </div>
        @endforeach
    @endif
    <form action="{{ route('category.update',$category->id) }}" method="post"> <!--llamamos a la post.store que es la ruta post que se encarga de meter los datos-->
        @csrf <!-- ayuda a que la peticion sea segura-->
        @method("PUT")
        <label for="">Titulo</label>
        <input type="text" name="title"  value="{{$category->title}}">
        <label for="">Slug</label>
        <input readonly type="text" name="slug" id="" value="{{$category->slug}}">
        <button type="submit">Enviar</button>
    </form>
@endsection