<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class CreateArticleForm extends Component
{
    #[Validate('required|min:5')]
    public $title;

    #[Validate('required|min:10')]
    public $description;

    #[Validate('required|min:5')]
    public $review;

    #[Validate('required|exists:categories,id')]
    public $category_id;

    public $categories;

    public function mount()
    {
        $this->categories = Category::orderBy('title')->get();
    }

    public function store()
    {
        $this->validate();

        Article::create([
            'title'       => $this->title,
            'description' => $this->description,
            'review'      => $this->review,
            'category_id' => $this->category_id,
            'user_id'     => Auth::id(),
        ]);

        $this->reset(['title', 'description', 'review', 'category_id']);

        session()->flash('success', 'Articolo creato correttamente!');
    }

    public function render()
    {
        return view('livewire.create-article-form');
    }
}
