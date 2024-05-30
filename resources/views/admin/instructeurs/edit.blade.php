<x-app-layout>
    <x-flowbite.title>
        Modifier un instructeur
        <x-flowbite.blue-button class="float-end" type="link"
            href="{{ route('instructeurs.index') }}">Annuler</x-flowbite.blue-button>
    </x-flowbite.title>

    <div class="p-4 border-gray-200 border-dashed rounded-lg mt-4border-2 dark:border-gray-700">
        {{-- form create --}}
        <div class="max-w-2xl mx-auto">
            <form action="{{ route('instructeurs.update', $instructeur) }}" method="POST" class="p-4 space-y-4 ">
                @csrf
                @method('PATCH')
                <!-- nom de instructeur -->
                <div>
                    <x-input-label for="nom" :value="__('Nom Instructeur')" />
                    <x-text-input id="nom" class="block w-full mt-1" type="text" name="nom"
                        :value="old('nom', $instructeur->nom)" required autofocus placeholder="Nom de Instructeur" />
                    <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                </div>

                <!-- prenom de instructeur -->
                <div>
                    <x-input-label for="prenom" :value="__('Prénom Instructeur')" />
                    <x-text-input id="prenom" class="block w-full mt-1" type="text" name="prenom"
                        :value="old('prenom', $instructeur->prenom)" required autofocus placeholder="Nom d'Instructeur" />
                    <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
                </div>

                <!-- CIN de instructeur -->
                <div>
                    <x-input-label for="cin" :value="__('Cin')" />
                    <x-text-input id="cin" class="block w-full mt-1" type="text" name="cin"
                        :value="old('cin', $instructeur->cin)" required autofocus placeholder="Numéro de la carte nationale" />
                    <x-input-error :messages="$errors->get('cin')" class="mt-2" />
                </div>

                <!-- address de instructeur -->
                <div>
                    <x-input-label for="adresse" :value="__('Adresse')" />
                    <x-text-input id="adresse" class="block w-full mt-1" type="text" name="adresse"
                        :value="old('adresse', $instructeur->adresse)" required autofocus placeholder="Rue 108 hay karima Salé" />
                    <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
                </div>

                <!-- Tel de instructeur -->
                <div>
                    <x-input-label for="tel" :value="__('Numéro Tél')" />
                    <x-text-input id="tel" class="block w-full mt-1" type="text" name="tel"
                        :value="old('tel', $instructeur->tel)" required autofocus placeholder="Nom d'Instructeur" />
                    <x-input-error :messages="$errors->get('tel')" class="mt-2" />
                </div>

                <!-- Email de instructeur -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block w-full mt-1" type="email" name="email"
                        :value="old('email', $instructeur->email)" required autofocus placeholder="gmail@exemple.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Sexe -->

                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                    <input id="bordered-radio-1" @checked($instructeur->sexe === 'm') type="radio" value="m"
                        name="sexe"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-radio-1"
                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Masculin</label>
                </div>
                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                    <input id="bordered-radio-2" @checked($instructeur->sexe === 'f') type="radio" value="f"
                        name="sexe"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-radio-2"
                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Féminin</label>
                </div>

                <!-- Matières -->
                <div>
                    <x-flowbite.select id="name" label="Matière" name="matieres[]" multiple>
                        <option value="" disabled selected>Selectionnez les matières</option>
                        @foreach ($matieres as $key => $matiere)
                            <option @selected($matieresSelected->contains($key)) class="py-4" value="{{ $key }}">
                                {{ $matiere }}</option>
                        @endforeach
                    </x-flowbite.select>
                    <x-input-error :messages="$errors->get('matieres')" class="mt-2" />
                </div>

                <!-- Button -->
                <div>
                    <x-flowbite.blue-button type="submit">Crier</x-flowbite.blue-button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
