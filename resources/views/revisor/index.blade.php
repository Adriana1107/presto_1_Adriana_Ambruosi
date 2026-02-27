<x-layout>
   <div class="container-fluid pt-5"> 
    <div class="row justify-content-center"> 
        <div class="col-3"> 
            <div class="rounded shadow bg-body-secondary"> 
                <h1 class="display-5 text-center pb-2"> revisor dashboard </h1>
             </div> 
            </div> 
        </div>
        @if ($article_to_check)
        <div class="row justify-content-center pt-5">

    
    <div class="col-md-6 text-center">
        @if($article_to_check->images->isNotEmpty())
            @php
                $image = $article_to_check->images->first();
            @endphp

            <img src="{{ Storage::url($image->path) }}" 
                 class="rounded shadow img-fluid mb-3" 
                 alt="immagine articolo">

            
            <h5>Labels</h5>
            @if($image->labels)
                @foreach ($image->labels as $label)
                    <span class="badge bg-secondary">#{{ $label }}</span>
                @endforeach
            @else
                <p class="fst-italic">No labels</p>
            @endif

            
            <h5 class="mt-4">Ratings</h5>

            <div>Adult: {{ $image->adult }}</div>
            <div>Violence: {{ $image->violence }}</div>
            <div>Spoof: {{ $image->spoof }}</div>
            <div>Racy: {{ $image->racy }}</div>
            <div>Medical: {{ $image->medical }}</div>

        @else
            <img src="https://picsum.photos/300" 
                 class="rounded shadow img-fluid" 
                 alt="immagine segnaposto">
        @endif
    </div>

   
    <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
        <div>
            <h1>{{ $article_to_check->title }}</h1>
            <h3>Autore: {{ $article_to_check->user->name }}</h3>
            <h4 class="fst-italic text-muted">
                {{ $article_to_check->category->title }}
            </h4>
            <p class="h6">{{ $article_to_check->description }}</p>
        </div>

        <div class="d-flex pb-4 justify-content-around mt-4">
            <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn btn-danger py-2 px-5 fw-bold">
                    Rifiuta
                </button>
            </form>

            <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn btn-success py-2 px-5 fw-bold">
                    Accetta
                </button>
            </form>
        </div>
    </div>

</div>
@endif
    </div>
</x-layout>

