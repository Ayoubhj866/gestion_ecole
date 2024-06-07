<x-app-layout>
    <x-flowbite.title>
        Ajouter un instructeur
    </x-flowbite.title>

    <div class="p-4 border-gray-200 border-dashed rounded-lg mt-4border-2 dark:border-gray-700">
        {{-- form create --}}
        <div class="max-w-6xl mx-auto">
            <form action="{{ route('instructeurs.store') }}" method="POST" class="p-4 space-y-4 ">
                @csrf

                <div class="grid gap-4 grid-col sm:grid-cols-2">

                    {{-- left --}}
                    <div>
                        <!-- nom de l'instructeur -->
                        <div>
                            <x-bladewind::input name="nom" required='true' type="text" :value="old('nom')"
                                label="Nom" prefix_is_icon="false" prefix_icon_css="text-gray-800" viewable="true" />
                            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                        </div>


                        <!-- prenom de instructeur -->
                        <div>
                            <x-bladewind::input name="prenom" required='true' type="text" :value="old('prenom')"
                                label="Prénom" viewable="true" />
                            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
                        </div>

                        <!-- CIN de instructeur -->
                        <div>
                            <x-bladewind::input name="cin" required='true' type="text" :value="old('cin')"
                                label="Numéro de la CIN" viewable="true" />
                            <x-input-error :messages="$errors->get('cin')" class="mt-2" />
                        </div>


                        <!-- address de instructeur -->
                        <div>
                            <x-bladewind::input name="adresse" required='true' type="text" :value="old('adresse')"
                                label="Adresse" viewable="true" />
                            <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
                        </div>
                    </div>

                    {{-- right --}}
                    <div class="text-gray-500 dark:text-white">
                        <!-- Tel de instructeur -->
                        <div>
                            <x-bladewind::input prefix="+212" name="tel" required='true' type="text"
                                :value="old('tel')" label="Numéro de Télephone" viewable="true" prefix_is_icon="false" />
                            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
                        </div>

                        <!-- Email de instructeur -->
                        <div>
                            <x-bladewind::input name="email" required='true' type="email" :value="old('email')"
                                label="Adresse email" viewable="true" prefix="envelope" prefix_is_icon="true" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Sexe -->
                        <x-bladewind::radio-button label="Masculin" value="m" :checked="true" name="sexe" />
                        <x-bladewind::radio-button label="Féminin" value="f" :checked="old('sexe') === 'f'" name="sexe" />

                        <!-- Matières -->
                        <div>
                            <x-bladewind::select name="matieres" searchable="true" label_key="matiere" value_key="key"
                                multiple="true" :selected_value="old('matieres')" :data="$matieres" />
                            <x-input-error :messages="$errors->get('matieres')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end gap-2">
                            <x-bladewind.button name="annuler" type="secondary" tag="a"
                                href="{{ route('instructeurs.index') }}" outline has_spinner="true" can_submit="true"
                                class="mt-3" onclick="showButtonSpinner('.annuler')">
                                {{ __('Annuler') }}
                            </x-bladewind.button>

                            <x-bladewind.button name="save-instructeur" has_spinner="true" color="black"
                                can_submit="true" class="mt-3" onclick="showButtonSpinner('.save-instructeur')">
                                {{ __('Ajouter') }}
                            </x-bladewind.button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

</x-app-layout>
