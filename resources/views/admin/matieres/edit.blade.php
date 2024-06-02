<x-app-layout>

    <x-flowbite.title>
        Modifier la Filière
    </x-flowbite.title>

    {{-- form create --}}
    <div class="max-w-sm mx-auto">
        <form action="{{ route('matieres.update', $matiere) }}" method="POST" class="p-4 space-y-4 ">
            @csrf
            @method('PATCH')
            <div>
                <x-bladewind::input name="name" required='true' autofocus type="text"
                    placeholder="{{ __('Matière') }}" :value="old('name', $matiere->name)" label="Full name" prefix_is_icon="false"
                    prefix_icon_css="text-gray-800" viewable="true" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- filières -->
            <div>
                <x-bladewind::select name="filieres" searchable="true" label_key="filiere" value_key="key"
                    multiple="true" :selected_value="old('filieres', collect($filieresSelected)->implode(', '))" :data="$filieres" />
                <x-input-error :messages="$errors->get('filieres')" class="mt-2" />
            </div>

            <!-- Button -->
            <div>
                <x-bladewind::button radius="medium" name="save-matiere" has_spinner="true"
                    onclick="showButtonSpinner('.save-matiere')" can_submit='true'
                    color="green">Modifier</x-bladewind::button>
            </div>
        </form>
    </div>

</x-app-layout>
