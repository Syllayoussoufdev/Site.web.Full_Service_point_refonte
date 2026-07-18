@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-yellow-400">
        <p class="text-sm text-gray-500">Articles publiés</p>
        <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalArticles }}</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-red-400">
        <p class="text-sm text-gray-500">Messages non lus</p>
        <p class="text-3xl font-bold text-gray-800 mt-1">{{ $messagesNonLus }}</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-blue-400">
        <p class="text-sm text-gray-500">Services actifs</p>
        <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalServices }}</p>
    </div>

</div>

<div class="bg-white rounded-xl shadow p-6">
    <h3 class="font-semibold text-gray-700 mb-4">Derniers articles</h3>
    @forelse($derniersArticles as $article)
        <div class="flex justify-between items-center py-2 border-b last:border-0">
            <span class="text-sm text-gray-700">{{ $article->titre }}</span>
            <span class="text-xs text-gray-400">{{ $article->created_at->format('d/m/Y') }}</span>
        </div>
    @empty
        <p class="text-sm text-gray-400">Aucun article pour l'instant.</p>
    @endforelse
</div>
@endsection