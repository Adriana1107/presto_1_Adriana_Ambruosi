<x-layout>
    <div class="container-fluid img">
        <div class="row">

        
        <h1 class="text-center mt-5 text-white">LISTA GUIDE AI VIDEOGAMES</h1>

        @if($articles->count() > 0)
            <div class="row">
                @foreach($articles as $article)
                 <div class="col-12 col-md-3">
                     <x-card :article="$article"/>
                 </div>
                @endforeach
            </div>

            {{ $articles->links() }}
        @else
        <div class="col-12 mt-5">
            <p class="text-center text-white">Nessun articolo trovato.</p>
            
        </div>
        @endif
        </div>
    </div>
</x-layout>
