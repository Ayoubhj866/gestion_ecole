<x-app-layout>

    <x-flowbite.title>
        Modifier la Filière
    </x-flowbite.title>


    {{-- form create --}}
    <div class="max-w-sm mx-auto mt-4 ">
        <form action="{{ route('filieres.update', $filiere) }}" method="POST" class="p-4 space-y-4 ">
            @csrf
            @method('PATCH')

            <!--  nom de filière -->
            <div>
                <x-bladewind::input name="name" required='true' autofocus type="text"
                    placeholder="{{ __('Filière') }}" :value="old('name', $filiere->name)" label="Filière" prefix_is_icon="false"
                    prefix_icon_css="text-gray-800" viewable="true" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Button -->
            <div>
                <x-bladewind::button can_submit="true" radius="medium" color="black" has_spinner="true"
                    onclick="showButtonSpinner('.save-filiere')" name="save-filiere">Modifier</x-bladewind::button>
            </div>
        </form>
    </div>

</x-app-layout>
