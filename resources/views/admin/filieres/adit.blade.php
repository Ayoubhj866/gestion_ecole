<x-app-layout>

    <x-flowbite.title>
        Modifier la Filière
    </x-flowbite.title>


    {{-- form create --}}
    <div class="max-w-sm">
        <form action="{{ route('filieres.update', $filiere) }}" method="POST" class="p-4 space-y-4 ">
            @csrf
            @method('PATCH')

            <!--  nom de filière -->
            <div>
                <x-input-label for="name" :value="__('Filière')" />
                <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name', $filiere->name)"
                    required autofocus placeholder="Nom de filière" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Button -->
            <div>
                <x-flowbite.blue-button type="submit">Modifier</x-flowbite.blue-button>
            </div>
        </form>
    </div>

</x-app-layout>
