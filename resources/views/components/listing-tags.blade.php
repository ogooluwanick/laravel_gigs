@props(['tagsCsv'])

@php
        $tags=explode(",",$tagsCsv);


        foreach($tags as $x=>$tag) {
                $tags[$x]=trim($tags[$x]);
                if($tag==""){
                        unset($tags[$x]);
                }
        }       
        if (end($tags) == "") { 
                array_pop($tags); 
        }
        
@endphp

<ul class="flex">
        @foreach($tags as $tag)
                <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
                        <a href="/?tag={{$tag}}">{{$tag}}</a>
                </li>
        @endforeach
    </ul>