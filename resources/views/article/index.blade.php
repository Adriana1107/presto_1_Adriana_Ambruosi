<x-layout>
    <div class="container-fluid img">
        <div class="row mb-5">

        
        <h1 class="text-center display-4 fw-bold mt-5 text-white">LISTA GUIDE AI VIDEOGAMES</h1>

        @if($articles->count() > 0)
            <div class="row g-4 justify-content-center">
                @foreach($articles as $article)
                 <div class="col-12 col-sm-6 col-lg-4 col-xl-3 d-flex justify-content-center">
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
