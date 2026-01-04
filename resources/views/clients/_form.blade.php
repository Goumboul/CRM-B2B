<div class="space-y-4">
    <div>
        <label class="block">Nom *</label>
        <input name="name"
               value="{{ old('name', $client->name ?? '') }}"
               class="w-full border p-2">
        @error('name') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block">Entreprise</label>
        <input name="company"
               value="{{ old('company', $client->company ?? '') }}"
               class="w-full border p-2">
    </div>

    <div>
        <label class="block">Email</label>
        <input name="email"
               value="{{ old('email', $client->email ?? '') }}"
               class="w-full border p-2">
    </div>

    <div>
        <label class="block">Téléphone</label>
        <input name="phone"
               value="{{ old('phone', $client->phone ?? '') }}"
               class="w-full border p-2">
    </div>
</div>
