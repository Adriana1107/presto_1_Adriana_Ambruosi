<div class="img">
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form class="bg-body-tertiary shadow rounded p-5 my-5 text-white" wire:submit.prevent="store">

        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input type="text" id="title" wire:model.blur="title" 
                   class="form-control @error('title') is-invalid @enderror">
            @error('title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

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
