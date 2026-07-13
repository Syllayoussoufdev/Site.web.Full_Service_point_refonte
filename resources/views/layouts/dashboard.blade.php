<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FSP Admin — @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">

    <!-- SIDEBAR -->
    <aside class="fixed top-0 left-0 h-screen w-64 bg-gray-900 text-white flex flex-col z-50">
        <div class="p-6 border-b border-gray-700">
            <h1 class="text-lg font-bold text-yellow-400">Full Service Point</h1>
            <p class="text-xs text-gray-400 mt-1">Administration</p>
        </div>

        <nav class="flex-1 p-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm
               {{ request()->routeIs('admin.dashboard') ? 'bg-yellow-500 text-gray-900 font-semibold' : 'text-gray-300 hover:bg-gray-700' }}">
                📊 Dashboard
            </a>
            <a href="{{ route('admin.articles.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm
               {{ request()->routeIs('admin.articles.*') ? 'bg-yellow-500 text-gray-900 font-semibold' : 'text-gray-300 hover:bg-gray-700' }}">
                📝 Articles
            </a>
            <a href="{{ route('admin.services.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm
               {{ request()->routeIs('admin.services.*') ? 'bg-yellow-500 text-gray-900 font-semibold' : 'text-gray-300 hover:bg-gray-700' }}">
                🛠️ Services
            </a>
            <a href="{{ route('admin.messages.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm
               {{ request()->routeIs('admin.messages.*') ? 'bg-yellow-500 text-gray-900 font-semibold' : 'text-gray-300 hover:bg-gray-700' }}">
                ✉️ Messages
            </a>

            @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.users.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm
               {{ request()->routeIs('admin.users.*') ? 'bg-yellow-500 text-gray-900 font-semibold' : 'text-gray-300 hover:bg-gray-700' }}">
                👥 Utilisateurs
            </a>
            @endif
        </nav>

        <div class="p-4 border-t border-gray-700">
            <p class="text-xs text-gray-400">{{ auth()->user()->name }}</p>
            <p class="text-xs text-gray-500">{{ ucfirst(auth()->user()->role) }}</p>
            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button class="text-xs text-red-400 hover:text-red-300">Déconnexion</button>
            </form>
        </div>
    </aside>

    <!-- MAIN -->
    <div class="ml-64 min-h-screen flex flex-col">

        <!-- TOPBAR -->
        <header class="bg-white shadow px-6 py-4 flex justify-between items-center sticky top-0 z-40">
            <h2 class="text-lg font-semibold text-gray-700">@yield('title', 'Dashboard')</h2>
            <span class="text-sm text-gray-400">{{ now()->format('d/m/Y') }}</span>
        </header>

        <!-- CONTENT -->
        <main class="flex-1 p-6">
            @if(session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>

    </div>
</body>
</html>