
 <div class="col-md-12 mb-4">
      <div class="card text-center bg-dark bg-opacity-75 shadow rounded p-5 my-5 text-white">
       <img src="{{ $article->images->isNotEmpty() 
               ? Storage::url($article->images->first()->path) 
               : 'https://picsum.photos/200' }}" 
               class="card-img-top" 
               alt="immagine di {{ $article->title }}">
        <div class="card-body">
                 <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text">{{ \Illuminate\Support\Str::limit($article->review, 150) }}</p>
                <p class="text-white">
                Categoria: {{ $article->category->title }} <br>
                Autore: {{ $article->user->name ?? 'Sconosciuto' }}
                </p>
               <a href="{{ route('articles.show', $article) }}" class="btn btn-dark">Leggi di più</a>
               <a href="{{ route('byCategory', ['category' => $article->category]) }}" class="btn btn-outline-info mt-1">{{ $article->category->title }}</a>

             @auth
                    @if(auth()->id() === $article->user_id)
                        <form class="mt-2" action="{{ route('articles.destroy', $article) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Sei sicuro di voler eliminare questo articolo?')">
                                <i class="fa-solid fa-trash-can me-1"></i> Elimina
                            </button>
                        </form>
                    @endif
                @endauth
          </div>
     </div>
</div>