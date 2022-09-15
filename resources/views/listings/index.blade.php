<x-Layout>
        @include('partials._hero')
        @include('partials._search')

                @if(count($listens)==0)
                        <p>No Lists found!</p>
                @endif
                <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
                        @foreach($listens as $item)
                                <x-listing-card :item="$item"/>                                                                {{--created a component  --}}
                        @endforeach
                </div>
</x-Layout>




       

        {{-- @foreach($listens as $item)
                <h2 > <a href="/listen/{{$item["id"]}}">{{$item["title"]}}</a></h2>
                <p>{{$item["desc"]}}</p>
        @endforeach --}}