<x-layout>
<div class="container-fluid pt-5">

    <div class="row justify-content-center">
        <div class="col-3">
            <div class="rounded shadow bg-body-secondary">
                <h1 class="display-5 text-center pb-2">Revisor Dashboard</h1>
            </div>
        </div>
    </div>

    @if ($article_to_check)

    <div class="row justify-content-center pt-5">

        
        <div class="col-md-6 text-center">

            @foreach ($article_to_check->images as $key => $image)

            <div class="card mb-4">
                <div class="row g-0">

                    <div class="col-md-6">
                        <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid"
                             class="img-fluid rounded-start"
                             alt="immagine articolo '{{ $article_to_check->title }}'">
                    </div>

                    
                    <div class="col-md-3">
                        <div class="card-body">
                            <h5>Labels</h5>
                            @if($image->labels)
                                @foreach ($image->labels as $label)
                                    <span class="badge rounded-pill bg-primary me-1">#{{ $label }}</span>
                                @endforeach
                            @endif

                        </div>
                    </div>

                   
                    <div class="col-md-3">
                        <div class="card-body">
                            <h5>Ratings</h5>

                            <div class="row">
                                <div class="col-2">
                                     <i class="{{ $image->adult }}"></i>
                                </div>
                                <div class="col-10">Adult</div>
                            </div>

                            <div class="row">
                                <div class="col-2">
                                     <i class="{{ $image->violence }}"></i>
                                </div>
                                <div class="col-10">Violence</div>
                            </div>

                            <div class="row">
                                <div class="col-2">
                                     <i class="{{ $image->spoof }}"></i>
                                </div>
                                <div class="col-10">Spoof</div>
                            </div>

                            <div class="row">
                                <div class="col-2">
                                    <i class="{{ $image->racy }}"></i>
                                </div>
                                <div class="col-10">Racy</div>
                            </div>

                            <div class="row">
                                <div class="col-2">
                                     <i class="{{ $image->medical }}"></i>
                                </div>
                                <div class="col-10">Medical</div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            @endforeach

        </div>

        <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">

            <div>
                <h1>{{ $article_to_check->title }}</h1>

                <h3>
                    Autore: {{ $article_to_check->user->name }}
                </h3>

                <h4 class="fst-italic text-muted">
                    {{ $article_to_check->category->title }}
                </h4>

                <p class="h6">
                    {{ $article_to_check->description }}
                </p>
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

    @else

    <div class="row justify-content-center pt-5">
        <div class="col-4 text-center">
            <img src="https://picsum.photos/300"
                 class="rounded shadow img-fluid"
                 alt="immagine segnaposto">
            <p class="mt-3">Nessun articolo da revisionare</p>
        </div>
    </div>

    @endif

</div>
</x-layout>