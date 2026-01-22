<x-layout>
    <div class="container bg-body-tertiary shadow rounded p-5 my-5">
        <h1 class="mb-4">LISTA GUIDE AI VIDEOGAMES</h1>

        @if($articles->count() > 0)
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-md-6 mb-4">
                        <div class="card bg-body-tertiary shadow rounded p-5 my-5">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{{ Str::limit($article->review, 150) }}</p>
                                <p class="text-muted">
                                    Categoria: {{ $article->category->title }} <br>
                                    Autore: {{ $article->user->name ?? 'Sconosciuto' }}
                                </p>
                                <a href="{{ route('articles.show', $article) }}" class="btn btn-dark">Leggi di più</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $articles->links() }}
        @else
            <p>Nessun articolo trovato.</p>
        @endif
    </div>
</x-layout>
