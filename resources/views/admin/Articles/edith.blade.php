@extends('layouts.dashboard')
@section('title', 'Modifier article')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-6">
    <form method="POST" action="{{ route('admin.articles.update', $article) }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Titre *</label>
            <input type="text" name="titre" value="{{ old('titre', $article->titre) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                   required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
            <input type="text" name="categorie" value="{{ old('categorie', $article->categorie) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Contenu *</label>
            <textarea name="contenu" rows="8"
                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                      required>{{ old('contenu', $article->contenu) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
            @if($article->image)
                <img src="{{ asset('storage/'.$article->image) }}"
                     class="w-32 h-20 object-cover rounded mb-2">
            @endif
            <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500">
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Statut *</label>
            <select name="statut"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                <option value="brouillon" {{ $article->statut === 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                <option value="publié" {{ $article->statut === 'publié' ? 'selected' : '' }}>Publié</option>
            </select>
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-yellow-400 text-gray-900 px-6 py-2 rounded-lg font-semibold hover:bg-yellow-500">
                Mettre à jour
            </button>
            <a href="{{ route('admin.articles.index') }}"
               class="px-6 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection