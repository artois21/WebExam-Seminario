@extends('crud.layout')

@section('content')
    <h1>Crear Post</h1>
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <div>
                {{$e}}
            </div>
        @endforeach
    @endif
    <form action="{{ route('post.store') }}" method="post"> <!--llamamos a la post.store que es la ruta post que se encarga de meter los datos-->
        @csrf <!-- ayuda a que la peticion sea segura-->
        <label for="">Titulo</label>
        <input type="text" name="title" value="{{old('title','Titulo del Post')}}">
        <label for="">Slug</label>
        <input type="text" name="slug" id="" value="{{old('slug','')}}">
        <label for="">contenido</label>
        <textarea name="content" id="" cols="30" rows="10">{{old('content','')}}</textarea>
        <label for="">Descripción</label>
        <textarea name="description" id="" cols="30" rows="10">{{old('description','')}}</textarea>
        <label for="">categoria</label>
        <select name="category_id" id="">
            @foreach ($categories as $c)
                <option {{old('category_id','') == $c->id ? "selected" : ""}} value="{{ $c->id }}">{{$c->title}}</option>
            @endforeach
        </select>
        <label for="">Posteado</label>
        <select name="posted" id="">
            <option {{old('posted','') == 'yes' ? "selected" : ""}} value="yes">Si</option>
            <option {{old('posted','') == 'not' ? "selected" : ""}} value="not">No</option>
        </select>
        <label for="">Imagen</label>
        <input type="text" name="image" id="">
        <button type="submit">Enviar</button>
    </form>
@endsection