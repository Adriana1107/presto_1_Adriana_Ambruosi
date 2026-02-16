 <div class="col-md-12 mb-4">
      <div class="card text-center bg-dark bg-opacity-75 shadow rounded p-5 my-5 text-white">
        <img src="http://picsum.photos/200" class="card-img-top" alt="immagine di {{ $article->title }}">
        <div class="card-body">
                 <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text">{{ Str::limit($article->review, 150) }}</p>
                <p class="text-white">
                Categoria: {{ $article->category->title }} <br>
                Autore: {{ $article->user->name ?? 'Sconosciuto' }}
                </p>
               <a href="{{ route('articles.show', $article) }}" class="btn btn-dark">Leggi di più</a>
               <a href="{{ route('byCategory', ['category' => $article->category]) }}" class="btn btn-outline-info mt-1">{{ $article->category->title }}</a>
          </div>
     </div>
</div>