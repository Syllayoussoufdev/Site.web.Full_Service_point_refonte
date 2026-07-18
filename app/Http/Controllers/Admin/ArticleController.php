<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre'   => 'required|string|max:255',
            'contenu' => 'required',
            'statut'  => 'required|in:brouillon,publié',
            'image'   => 'nullable|image|max:2048',
        ]);

        // Récupérer les données du formulaire et créer un nouvel article
        // verifie 
        $articles = $request->only('titre','contenu','categorie','statut');
        
        //generer un slug à partir du titre 
        $articles['slug']    = Str::slug($request->titre);
        $articles['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $articles['image'] = $request->file('image')->store('articles','public');

        }

        Article::create($articles);

        return redirect()->route('admin.articles.index')
                         ->with('success', 'Article créé.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'titre'   => 'required|string|max:255',
            'contenu' => 'required',
            'statut'  => 'required|in:brouillon,publié',
            'image'   => 'nullable|image|max:2048',
        ]);

        $data = $request->only('titre','contenu','categorie','statut');
        $data['slug'] = Str::slug($request->titre);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles','public');
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')
                         ->with('success', 'Article mis à jour.');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back()
                         ->with('success', 'Article supprimé.');
    }
}
