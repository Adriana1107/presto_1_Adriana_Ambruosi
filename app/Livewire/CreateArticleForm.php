<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
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
                $this->article->images()->create(['path' => $image->store('images', 'public')]);
            }
        }

        $this->reset(['title', 'description', 'review', 'category_id']);

        session()->flash('success', 'Articolo creato correttamente!');
    }


    public function render()
    {
        return view('livewire.create-article-form');
    }

    public function updatedtemporaryImages(){
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
