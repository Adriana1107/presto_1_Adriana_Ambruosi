<div>
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form class="bg-body-tertiary shadow rounded p-5 my-5" wire:submit.prevent="store">

        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input type="text" id="title" wire:model.blur="title" 
                   class="form-control @error('title') is-invalid @enderror">
            @error('title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="file" wire:model.live="temporary_images" multiple class="form-control shadow @error('temporary_images.*')is-invalid @enderror" placeholder="img/">
            @error('temporary_images.*')
            <p class="fst-italic text-danger">{{ $message }}</p>
            @enderror
            @error('temporary_images')
            <p class="fst-italic text-danger">{{ $message }}</p>
            @enderror
        </div>
        @if (!empty($images))
        <div class="row">
            <div class="col-12">
                <p>photo preview:</p>
                <div class="row border border-4 border-success rounded shadow py-4">
                    @foreach ($images as $key => $image )
                        <div class="col d-flex flex-column align-items-center my-3">
                            <div class="mx-auto shadow rounded img-preview" style="background-image: url('{{ $image->temporaryUrl() }}');"></div>
                            <button type="button" class="btn mt-1 btn-danger" wire:click="removeImage({{ $key }})">X</button>
                        </div>
                    
                    @endforeach
                </div>
            </div>
        </div>
        
        @endif

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione / guida al gioco</label>
            <textarea id="description" rows="5" wire:model.blur="description"
                      class="form-control @error('description') is-invalid @enderror"></textarea>
            @error('description')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="review" class="form-label">Recensione:</label>
            <textarea id="review" rows="5" wire:model.blur="review"
                      class="form-control @error('review') is-invalid @enderror"></textarea>
            @error('review')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select id="category" wire:model="category_id"
                    class="form-select @error('category_id') is-invalid @enderror">
                <option value="" disabled>Seleziona Categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Crea</button>
        </div>

    </form>
</div>
