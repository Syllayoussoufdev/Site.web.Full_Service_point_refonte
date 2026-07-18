<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <h2 class="text-lg font-medium mb-4">Modifier le service</h2>

                <form action="{{ route('services.update', $service) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Nom -->
                    <div class="mb-4">
                        <label>Nom du service</label>
                        <input type="text" name="nom" class="block w-full border-gray-300 rounded-md" value="{{ old('nom', $service->nom) }}" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label>Description</label>
                        <textarea name="description" class="block w-full border-gray-300 rounded-md" required>{{ old('description', $service->description) }}</textarea>
                    </div>

                    <!-- Icône -->
                    <div class="mb-4">
                        <label>Icône (nom de la classe Font Awesome)</label>
                        <input type="text" name="icone" class="block w-full border-gray-300 rounded-md">
                    </div>
                    <!-- Ordre -->
                    <div class="mb-4">
                        <label>Ordre d'affichage</label>
                        <input type="number" name="ordre" class="block w-full border-gray-300 rounded-md" value="0">
                    </div>
                    <!-- Statut -->
                    <div class="mb-4">
                        <label>Statut</label>
                        <select name="statut" class="block w-full border-gray-300 rounded-md">
                            <option value="1" selected>Actif</option>
                            <option value="0">Inactif</option>
                        </select>
                    </div>Ok continuons 

                    <!-- Prix & Checkbox -->
                    <div class="flex gap-4 mb-4">
                        <div class="flex-1">
                            <label>Prix :</label>
                            <input type="number" step="0.01" name="prix" class="block w-full border-gray-300 rounded-md" value="{{ old('prix', $service->prix) }}">
                        </div>
                        <div class="flex items-center mt-6">
                            <input type="hidden" name="prix_sur_devis" value="0">
                            <input type="checkbox" name="prix_sur_devis" value="1" {{ old('prix_sur_devis', $service->prix_sur_devis) ? 'checked' : '' }} class="rounded">
                            <label class="ml-2">Prix sur devis uniquement</label>
                        </div>
                    </div>
                    <button type="submit" class="bg-blue-600  px-4 py-2 rounded">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>