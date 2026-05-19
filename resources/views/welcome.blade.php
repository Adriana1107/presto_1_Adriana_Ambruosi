<x-layout>
    <div class="container-fluid text-center text-white">
        <div class="row justify-content-center align-items-center">

            <div class="col-12 img">

                <h1 class="display-4 font text-white ms-3 mt-5">
                    Game Over?
                </h1>

                <h4>
                    Scopri. Recensisci. Condividi.
                </h4>

                <div class="row justify-content-center align-items-center py-5">

                    <div class="col-12 col-md-5 mb-3 text-center">

                        <h5 class="mt-5">
                            Vuoi diventare revisore?
                        </h5>

                        <p>
                            Clicca qui per saperne di più!
                        </p>

                        <a href="{{ route('become.revisor') }}" class="btn btn-success">
                            diventa revisore!
                        </a>

                        @if (session()->has('errorMessage'))
                            <div class="mt-3 alert alert-danger text-center shadow rounded">
                                {{ session('errorMessage') }}
                            </div>
                        @endif

                        @if (session()->has('message'))
                            <div class="mt-3 alert alert-success text-center shadow rounded">
                                {{ session('message') }}
                            </div>
                        @endif

                        @auth
                            <div class="mt-3">
                                <a class="btn btn-secondary" href="{{ route('create.article') }}">
                                    Crea
                                </a>
                            </div>
                        @endauth

                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="container-fluid body py-5">

        <div class="row justify-content-center g-4">

            @forelse ($articles as $article)

                <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center">
                    <x-card :article="$article"/>
                </div>

            @empty

                <div class="col-12">
                    <h3 class="text-center text-white">
                        Nessun Articolo
                    </h3>
                </div>

            @endforelse

        </div>

    </div>
</x-layout>