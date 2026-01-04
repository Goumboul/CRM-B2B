<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                Clients
            </h2>

            <a href="{{ route('clients.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded">
                + Nouveau client
            </a>
        </div>
    </x-slot>

    <div class="p-6">
        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border">
            <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border">Nom</th>
                <th class="p-2 border">Entreprise</th>
                <th class="p-2 border">Email</th>
                <th class="p-2 border">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($clients as $client)
                <tr>
                    <td class="p-2 border">{{ $client->name }}</td>
                    <td class="p-2 border">{{ $client->company }}</td>
                    <td class="p-2 border">{{ $client->email }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('clients.edit', $client) }}"
                           class="text-blue-600">Éditer</a>

                        <form action="{{ route('clients.destroy', $client) }}"
                              method="POST"
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 ml-2">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center">
                        Aucun client
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $clients->links() }}
        </div>
    </div>
</x-app-layout>
