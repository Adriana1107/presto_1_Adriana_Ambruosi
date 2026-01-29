<x-layout>
    <div class="container bg-body-tertiary shadow rounded p-5 my-5">
        <h1 class="mb-4 text-white">LISTA GUIDE AI VIDEOGAMES</h1>

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
        <div class="col-12">
            <p class="text-center">Nessun articolo trovato.</p>
            
        </div>
        @endif
    </div>
</x-layout>
