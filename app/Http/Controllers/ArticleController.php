<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Routing\Controller;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('create', 'destroy');
    }

    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

     public function index()
    {
       
       $articles = Article::where('is_accepted', true)
                   ->with(['category', 'user'])
                   ->orderBy('created_at', 'desc')
                   ->paginate(10); 

        return view('article.index', compact('articles'));
    }
    public function show(Article $article)
    {
    
        $article->load(['category', 'user']);

        return view('article.show', compact('article'));
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles->where('is_accepted', true);
        return view('article.byCategory', compact('articles', 'category'));
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')
                        ->with('success', 'Articolo eliminato con successo!');
    }
}

