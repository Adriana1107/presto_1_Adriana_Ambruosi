<x-layout>
    <div class="container-fluid text-center">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-12">
                <h1 class="display-4 font mt-5 me-5">Game Over?</h1>
                <div class="row justify-content-center align-items-center py-5">
                    @forelse ($articles as $article)
                    <div class="col-12 col-md-3">
                        <x-card :article="$article"/>
                    </div>
                    @empty
                    <div class="col-12">
                        <h3 class="text-center">Nessun Articolo</h3>
                    </div>
                    @endforelse
                </div>
                <div class="my-3">
                    @auth
                    <a class="btn btn-secondary mt-5 me-5" href="{{ route('create.article') }}">Crea</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-layout>