<x-layout>
   

        <div class="container py-5 position">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-4 text-white">
                    <h1 class="mb-3">{{ $article->title }}</h1>
    
                    <div class="me-5">
                
                        <div class="mb-4">
                            <h5>Descrizione / guida al gioco</h5>
                            <p>{{ $article->description }}</p>
                        </div>
                
                        <div class="mb-4">
                            <h5>Recensione</h5>
                            <p>{{ $article->review }}</p>
                        </div>
                         <p class="text-muted">
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
