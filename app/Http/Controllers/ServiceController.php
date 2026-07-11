<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        // Récupérer tous les services depuis la base de données
        $services = Service::all();

        // Retourner la vue avec les services
        return view('services.index', compact('services'));
    }

    public function create()
    {
        // Retourner la vue pour créer un nouveau service
        return view('services.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'nullable|numeric',
            'prix_sur_devis' => 'boolean',
            'icone' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services',
            'ordre' => 'nullable|integer',
            'statut' => 'boolean',
        ]);

        // Générer un slug automatiquement pas besoin de le remplir
        $validatedData['slug'] = Str::slug($validatedData['nom'], '-');

        // Créer un nouveau service avec les données validées
        Service::create($validatedData);

        // Rediriger vers la liste des services avec un message de succès
        return redirect()->back()->with('success', 'Service créé avec succès.');
    }

    public function edit(Service $service)
    {
        // Retourner la vue pour éditer un service existant
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'nullable|numeric',
            'prix_sur_devis' => 'boolean',
        ]);

        // Mettre à jour le service avec les données validées
        $service->update($validatedData);

        // Rediriger vers la liste des services avec un message de succès
        return redirect()->back()->with('success', 'Service mis à jour avec succès.');
    }


    public function destroy(Service $service)
    {
        // Supprimer le service
        $service->delete();

        // Rediriger vers la liste des services avec un message de succès
        return redirect()->back()->with('success', 'Service supprimé avec succès.');
    }
}
