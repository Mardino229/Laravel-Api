<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group Gestion des categorie
 */
class ArticleApiController extends Controller
{


    /**
     * @authenticated
     */

    public function index() {
        $articles = Article::all();
        return response()->json(compact('articles'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
        ]);
        $article = Article::create($request->all());
        return response()->json(compact("article"))->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(int $id) {
        $article = Article::find($id);
        return response()->json(compact("article"));
    }

    public function update(Request $request, int $id) {
        $article = Article::find($id);
        $article->update($request->all());
        return response()->json(compact("article"))->setStatusCode(Response::HTTP_ACCEPTED);

    }
    public function destroy(int $id) {
        $article = Article::find($id);
        $article->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
