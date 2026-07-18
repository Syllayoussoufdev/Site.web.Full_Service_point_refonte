<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalArticles'    => \App\Models\Article::count(),
            'messagesNonLus'   => \App\Models\Message::where('lu', false)->count(),
            'totalServices'    => \App\Models\Service::count(),
            'derniersArticles' => \App\Models\Article::latest()->take(5)->get(),
        ]);
    }
}
