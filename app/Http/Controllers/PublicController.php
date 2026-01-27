<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage(){

        $articles = Article::take(6)->orderby('created_at', 'desc')->get();
        return view ('welcome', compact('articles'));
    }
}
