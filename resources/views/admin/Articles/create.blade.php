@extends('layouts.dashboard')
@section('title', 'Nouvel article')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-6">
    <form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Titre *</label>
            <input type="text" name="titre" value="{{ old('titre') }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                   required>
            @error('titre')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
            <input type="text" name="categorie" value="{{ old('categorie') }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Contenu *</label>
            <textarea name="contenu" rows="8"
                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                      required>{{ old('contenu') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
            <input type="file" name="image" accept="image/*"
                   class="w-full text-sm text-gray-500">
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Statut *</label>
            <select name="statut"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                <option value="brouillon">Brouillon</option>
                <option value="publié">Publié</option>
            </select>
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-yellow-400 text-gray-900 px-6 py-2 rounded-lg font-semibold hover:bg-yellow-500">
                Enregistrer
            </button>
            <a href="{{ route('admin.articles.index') }}"
               class="px-6 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection