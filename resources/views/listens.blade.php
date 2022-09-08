@extends('Layout')

@section('content')
        <h1>{{$heading}}</h1>
                @if(count($listens)==0)
                        <p>No Lists found!</p>
                @endif

                @foreach($listens as $item)
                        <h2 > <a href="/listen/{{$item["id"]}}">{{$item["title"]}}</a></h2>
                        <p>{{$item["desc"]}}</p>
                @endforeach
@endsection