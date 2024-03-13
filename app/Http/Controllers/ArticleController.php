<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('article.create', ['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->full_text = $request->full_text;



        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = uniqid('article-') . '.' . $image->extension();
            $image->storeAs('public/articles/', $imageName);
            $article->image = $imageName;
        }
        $article->save();

        $article->tags()->attach($request->tags);
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrfail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('article.edit', ['article' => $article, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->full_text = $request->full_text;

        $imageName = $this->saveAndGetImageName($request);
        if ($imageName) {
            $article->image = $imageName;
            Storage::delete('/articles/' . $article->image);
        }
        $article->update();
        $article->tags()->sync($request->tags);
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }

    private function saveAndGetImageName($request)
    {
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = uniqid('article-') . '.' . $image->extension();
            $image->storeAs('public/articles/', $imageName);
        }
        return $imageName;
    }
}
