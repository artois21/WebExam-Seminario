<div>
   {{$slot}}
    @foreach ($datos as $p)
        <div>
            <h3>{{$p->title}}</h3>
            <p>{{$p->description}}</p>
            <a href="{{route("web.show",$p)}}">Ver</a>
        </div>
    @endforeach
    {{$datos->links()}}
</div>
{{$footer}}