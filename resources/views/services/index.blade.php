<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <h2 class="text-lg font-medium mb-4">Liste des services</h2>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prix</th>
                            <th>Sur devis</th>
                            <th>Icône</th>
                            <th>Ordre</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->nom }}</td>
                            <td>{{ $service->prix ? $service->prix . ' €' : 'N/A' }}</td>
                            <td>{{ $service->prix_sur_devis ? 'Oui' : 'Non' }}</td>
                            <td>{{ $service->icone }}</td>
                            <td>{{ $service->ordre }}</td>
                            <td>{{ $service->statut ? 'Actif' : 'Inactif' }}</td>
                            <td>
                                <a href="{{ route('services.edit', $service) }}" class="text-blue-600 hover:text-blue-900">Modifier</a>
                                <form action="{{ route('services.destroy', $service) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>