<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Categorie::all();
        return view('listeCategory', [
            'categories'=> $categories,
        ]);
    }

    public function store(Request  $request) {
        Categorie::create($request->all());
        return to_route('articles.index');
    }

    public function create(){
        $category = new Categorie();
        return view('createCategory', [
            'category' => $category,
        ]);
    }

    public function edit(Categorie $category){
        return  view('createCategory', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, Categorie $category) {
        $category->update($request->all());
        return to_route('articles.index');
    }
    public function destroy(Categorie $category) {
        $category->delete();
        return to_route('articles.index');
    }
}
