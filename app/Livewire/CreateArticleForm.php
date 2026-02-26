<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\ResizeImage;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticleForm extends Component
{

    use WithFileUploads;

    #[Validate('required|min:5')]
    public $title;

    #[Validate('required|min:10')]
    public $description;

    #[Validate('required|min:5')]
    public $review;

    #[Validate('required|exists:categories,id')]
    public $category_id;

    public $categories;

    public $images = [];
    public $temporary_images;
    public $article;

    public function mount()
    {
        $this->categories = Category::orderBy('title')->get();
    }

    public function store()
    {
        $this->validate();

        $this->article = Article::create([
            'title'       => $this->title,
            'description' => $this->description,
            'review'      => $this->review,
            'category_id' => $this->category_id,
            'user_id'     => Auth::id(),
        ]);

        if(count($this->images) > 0){
            foreach ($this->images as $image){
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);
                dispatch(new ResizeImage($newImage->path, 300, 300));
                dispatch(new GoogleVisionSafeSearch($newImage->id));
                dispatch(new GoogleVisionLabelImage($newImage->id));
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        $this->reset(['title', 'description', 'review', 'category_id']);

        session()->flash('success', 'Articolo creato correttamente!');
    }


    public function render()
    {
        return view('livewire.create-article-form');
    }

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images' => 'max:6'
        ])){
            foreach ($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

     protected function cleanForm(){
        $this->title = '';
        $this->description = '';
        $this->review = '';
        $this->category_id = '';
        $this->images = '';

    }

}
