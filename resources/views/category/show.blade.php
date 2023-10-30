@extends('crud.layout')

@section('content')
    <h1>{{$category->title}}</h1>
    <p>{{$category->slug}}</p>
@endsection
