<x-layout>
    <div class="container py-5">
        <h1 class="mb-3">{{ $article->title }}</h1>

        <p class="text-muted">
            Categoria: {{ $article->category->title }} <br>
            Autore: {{ $article->user->name ?? 'Sconosciuto' }} <br>
            Pubblicato il: {{ $article->created_at->format('d/m/Y') }}
        </p>

        <div class="mb-4">
            <h5>Descrizione / guida al gioco</h5>
            <p>{{ $article->description }}</p>
        </div>

        <div class="mb-4">
            <h5>Recensione</h5>
            <p>{{ $article->review }}</p>
        </div>

        <a href="{{ route('articles.index') }}" class="btn btn-secondary">Torna alla lista articoli</a>
    </div>
</x-layout>
