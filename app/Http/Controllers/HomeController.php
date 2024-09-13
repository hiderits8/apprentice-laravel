<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::with('tags')->orderByDesc('created_at')->paginate(5);
        return view('home', compact('articles'));
    }
}
