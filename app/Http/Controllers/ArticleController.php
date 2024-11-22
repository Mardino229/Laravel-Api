<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::all();
        $categories = Categorie::all();
//        dd($categories);
        return view('liste', [
            'articles'=> $articles,
            'categories' => $categories
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
        ]);
        Article::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);
        return to_route('articles.index');
    }

    public function create(){
        $article = new Article();
        return view('createArticle', [
            'article' => $article,
            'categories'  => Categorie::pluck('name', 'id'),
        ]);
    }

    public function edit(Article $article){
        $article = Article::findOrFail($article->id);
        return  view('createArticle', [
            'article' => $article,
            'categories'  => Categorie::pluck('name', 'id'),
        ]);
    }

    public function update(Request $request, Article $article) {
        $article->update($request->all());
        return to_route('articles.index');
    }
    public function destroy(Article $article) {
        $article->delete();
        return to_route('articles.index');
    }


}
