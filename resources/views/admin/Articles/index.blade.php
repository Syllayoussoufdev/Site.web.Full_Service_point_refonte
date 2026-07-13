@extends('layouts.dashboard')
@section('title', 'Articles')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h3 class="font-semibold text-gray-700">Tous les articles</h3>
    <a href="{{ route('admin.articles.create') }}"
       class="bg-yellow-400 text-gray-900 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-yellow-500">
        + Nouvel article
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    @forelse($articles as $article)
    <div class="flex justify-between items-center px-6 py-4 border-b last:border-0">
        <div>
            <p class="font-medium text-gray-800">{{ $article->titre }}</p>
            <p class="text-xs text-gray-400">{{ $article->created_at->format('d/m/Y') }} — {{ $article->statut }}</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.articles.edit', $article) }}"
               class="text-sm text-blue-600 hover:underline">Modifier</a>
            <form method="POST" action="{{ route('admin.articles.destroy', $article) }}"
                  onsubmit="return confirm('Supprimer ?')">
                @csrf @method('DELETE')
                <button class="text-sm text-red-500 hover:underline">Supprimer</button>
            </form>
        </div>
    </div>
    @empty
        <p class="px-6 py-4 text-gray-400 text-sm">Aucun article.</p>
    @endforelse
</div>

<div class="mt-4">{{ $articles->links() }}</div>
@endsection