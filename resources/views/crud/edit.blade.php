@extends('crud.layout')

@section('content')
    <h1>Actualizar Crud {{$post->title}}</h1>
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <div>
                {{$e}}
            </div>
        @endforeach
    @endif
    <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data"> <!--llamamos a la post.store que es la ruta post que se encarga de meter los datos-->
        @csrf <!-- ayuda a que la peticion sea segura-->
        @method("PUT")
        <label for="">Titulo</label>
        <input type="text" name="title"  value="{{$post->title}}">
        <label for="">Slug</label>
        <input readonly type="text" name="slug" id="" value="{{$post->slug}}">
        <label for="">contenido</label>
        <textarea name="content" id="" cols="30" rows="10">{{$post->content}}</textarea>
        <label for="">Descripción</label>
        <textarea name="description" id="" cols="30" rows="10">{{$post->description}}</textarea>
        <label for="">categoria</label>
        <select name="category_id" id="">
            @foreach ($categories as $c)
                <option value="{{ $c->id }}">{{$c->title}}</option>
            @endforeach
        </select>
        <label for="">Posteado</label>
        <select name="posted" id="" value="{{$post->posted}}">
            <option {{ $post->posted == "yes" ? 'selected' : ''}} value="yes">Si</option>
            <option {{ $post->posted == "not" ? 'selected' : ''}} value="not">No</option>
        </select>
        <label for="">Imagen</label>
        <input type="file" name="image" id="">
        <input type="text" name="image" id="" value="{{$post->image}}">
        <button type="submit">Enviar</button>
    </form>
@endsection