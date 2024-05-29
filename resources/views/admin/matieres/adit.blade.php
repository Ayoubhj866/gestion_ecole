<x-app-layout>

    <x-flowbite.title>
        Modifier la Filière
    </x-flowbite.title>

    {{-- form create --}}
    <div class="max-w-sm">
        <form action="{{ route('matieres.store') }}" method="POST" class="p-4 space-y-4 ">
            @csrf
            <!-- nom de matière -->
            <div>
                <x-input-label for="name" :value="__('Matière')" />
                <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name', $matiere->name)"
                    required autofocus placeholder="Nom de Matière" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- filière -->
            <div>
                <x-flowbite.select id="name" label="Filière" name="filiere[]" multiple>
                    <option value="" disabled selected>Selectionnez filière</option>
                    @foreach ($filieres as $key => $filiere)
                        <option @selected($filieresSelected->contains($key)) class="py-4" value="{{ $key }}">
                            {{ $filiere }}</option>
                    @endforeach
                </x-flowbite.select>
                <x-input-error :messages="$errors->get('filiere')" class="mt-2" />
            </div>

            <!-- Button -->
            <div>
                <x-flowbite.blue-button type="submit">Crier</x-flowbite.blue-button>
            </div>
        </form>
    </div>

</x-app-layout>
