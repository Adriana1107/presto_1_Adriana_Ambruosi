<x-layout>
    <div class="container-fluid text-center text-white">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-12 img">
                <h1 class="display-4 font text-white ms-3 mt-5">Game Over?</h1>
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
                    <div class="col-md-5 mb-3 text-center">
                <h5>Vuoi diventare revisore?</h5>
                <p>Clicca qui per saperne di più!</p>
                <a href="{{ route('become.revisor') }}" class="btn btn-success">diventa revisore!</a>

                 @if (session()->has('errorMessage'))
                    <div class="mt-3 alert alert-danger text-center shadow rounded w-50">
                        {{ session('errorMessage')}}
                    </div>
                @endif
                 @if (session()->has('message'))
                        <div class="mt-3 alert alert-success text-center shadow rounded">
                         {{ session('message') }}
                        </div>
                @endif
            </div>
            <div class="my-3">
                    @auth
                    <a class="btn btn-secondary mt-5 me-5" href="{{ route('create.article') }}">Crea</a>
                    @endauth
                </div>
                </div>
                
                
            </div>
            

        </div>
    </div>
</x-layout>