<x-layout>
    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-3">
                <div class="rounded shadow bg-body-secondary">
                    <h1 class="display-5 text-center pb-2">
                           revisor dashboard 
                    </h1>
                </div>
            </div>
        </div>
        @if ($article_to_check)
        @foreach ($article_to_check->images as $key=>$image )
        <div class="col-6 col-md-4 mb-4">
            <img src="{{asset ($image->getUrl(300, 300)) }}" class="rounded-start img-fluid" alt="immagine {{ $key +1 }} dell'articolo '{{ $article_to_check->title }}'">
        </div>

        <div class="col-md-5 ps-3">
            <div class="card-body">
                <h5>labels</h5>
                @if($image->labels)
                    @foreach ($image->labels as $label)
                    #{{ $label }},
                    @endforeach
                @else
                <p class="fst-italic">No labels</p>
                @endif

            </div>
        </div>
        <div class="col-md-8 ps-3">
            <div class="card-body">
                <h5>Ratings</h5>
                <div class="row justify-content-center">
                    <div class="col-2">
                        <div class="text-centere mx-auto {{ $image->adult }}"></div>
                    </div>
                    <div class="col-10">adult</div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-2">
                        <div class="text-centere mx-auto {{ $image->violence }}"></div>
                      </div>
                      <div class="col-10">violence</div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-2">
                        <div class="text-centere mx-auto {{ $image->spoof }}"></div>
                      </div>
                      <div class="col-10">spoof</div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-2">
                        <div class="text-centere mx-auto {{ $image->racy }}"></div>
                      </div>
                      <div class="col-10">racy</div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-2">
                        <div class="text-centere mx-auto {{ $image->medical }}"></div>
                      </div>
                      <div class="col-10">medical</div>
                </div>




            </div>
        </div>
        
        @endforeach
            <div class="row justify-content-center pt-5">
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        @for($i= 0; $i < 6; $i++)
                            <div class="col-6 col-md-4 mb-4 text-center">
                                <img src="https://picsum.photos/300" class="rounded shadow" alt="immagine segnaposto">
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                    <div>
                        <h1>{{ $article_to_check->title }}</h1>
                        <h3>Autore: {{ $article_to_check->user->name }}</h3>
                        <h4 class="fst-italic text-muted">{{ $article_to_check->category->title }}</h4>
                        <p class="h6">{{ $article_to_check->description }}</p>
                    </div>
                    <div class="d-flex pb-4 justify-content-around">
                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger py-2 px-5 fw-bold">Rifiuta</button>
                        </form>
                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success py-2 px-5 fw-bold">Accetta</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-12">
                    <h1 class="fst-italic display-4">Nessun articolo da revisionare</h1>
                    <a href="{{ route('homepage') }}" class="mt-5 btn btn-success">Torna all'homepage</a>
                </div>
            </div>
        @endif
        @if (session()->has('message'))
            <div class="row justify-content-center">
                <div class="col-5 alert alert-success text-center shadow rounded">
                    {{ session('message') }}
                </div>
            </div>
        @endif
    </div>
</x-layout>