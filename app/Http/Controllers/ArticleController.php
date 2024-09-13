<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        if ($request->tag && !Tag::where('name', '=', $request->tag)->first()) {
            Tag::create([
                'name' => $request->tag,
            ]);
        }
        $article = Article::create([
            'title' => $request->title,
            'lead' => $request->lead,
            'text' => $request->text,
        ]);
        $tag = Tag::where('name', '=', $request->tag)->first();
        $article->tags()->attach($tag->id);
        return to_route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::find($id);
        $comments = Article::find($id)->comments;
        return view('articles.show', compact('article', 'comments'));
    }

    public function addComment(Request $request, string $id)
    {
        $comment = Comment::creat([
            'comment' => $request->comment,
        ]);

        $article = Article::find($id);
        $comments = $article->comments;
        $comments->attach($comment);

        return to_route('articles.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);
        $tags = Article::find($id)->tags()->get();
        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->tag && !Tag::where('name', '=', $request->tag)->first()) {
            Tag::create([
                'name' => $request->tag,
            ]);
        }
        $article = Article::find($id);
        $article->title = $request->title;
        $article->lead = $request->lead;
        $article->text = $request->text;
        //tag
        $tag = Tag::where('name', '=', $request->tag)->first();
        $article->tags()->attach($tag->id);
        $article->save();

        return to_route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        $article->delete();

        return to_route('index');
    }
}
