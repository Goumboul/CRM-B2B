<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Créer un client</h2>
    </x-slot>

    <form method="POST" action="{{ route('clients.store') }}" class="p-6">
        @csrf

        @include('clients._form')

        <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">
            Enregistrer
        </button>
    </form>
</x-app-layout>
