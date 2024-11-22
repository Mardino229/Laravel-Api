<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryApiController extends Controller
{
    public function index() {
        $categories = Categorie::all();
        return response()->json($categories);
    }

    public function store(Request  $request) {
        $category = Categorie::create($request->all());
        return response()->json($category)->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Request $request, int $id) {
        $category = Categorie::find($id);
        return response()->json($category);
    }

    public function update(Request $request, int $id) {
        $category = Categorie::find($id);
        $category->update($request->all());
        return response()->json($category)->setStatusCode(Response::HTTP_ACCEPTED);
    }
    public function destroy(int $id) {
        $category = Categorie::find($id);
        $category->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
