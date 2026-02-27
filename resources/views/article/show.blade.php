<x-layout>
        <div class="container-fluid img">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-4 text-white mt-5">
                    <h1 class="mb-3">{{ $article->title }}</h1>

                    <div class="col-12 col-md-6 mb-3">
                        @if ($article->images->count() > 0)
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach ($article->images as $key => $image)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    <img src="{{ Storage::url($image->path) }}" class="d-block w-100 rounded shadow " alt="immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                </div>
                                @endforeach
                            </div>
                            @if ($article->images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            @endif
                        </div>
                        @else
                            <img src="https://picsum.photos/300" alt="nessuna foto inserita dall'utente">
                        
                        @endif
                    </div>
    
                    <div class="me-5">
                
                        <div class="mb-4">
                            <h5>Descrizione / guida al gioco</h5>
                            <p>{{ $article->description }}</p>
                        </div>
                
                        <div class="mb-4">
                            <h3>Recensione</h5>
                            <p>{{ $article->review }}</p>
                        </div>
                         <p class="text-white">
                            Categoria: {{ $article->category->title }} <br>
                            Autore: {{ $article->user->name ?? 'Sconosciuto' }} <br>
                            Pubblicato il: {{ $article->created_at->format('d/m/Y') }}
                        </p>
                
                        <a href="{{ route('articles.index') }}" class="btn btn-secondary">Torna alla lista articoli</a>
                    </div>
            
    
                </div>
    
            </div>
        </div>
</x-layout>
