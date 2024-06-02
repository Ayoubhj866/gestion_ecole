<x-app-layout>

    <x-flowbite.title>
        FIlières
    </x-flowbite.title>

    <div class="p-4 border-gray-200 border-dashed rounded-lg mt-4border-2 dark:border-gray-700">
        <div class="mt-2">

            <div class="grid gap-4 px-8 py-4 bg-white grid-col md:grid-cols-2 dark:bg-gray-800">
                {{-- form create --}}
                <div class="max-w-sm">
                    <form action="{{ route('filieres.store') }}" method="POST" class="p-4 space-y-4 ">
                        @csrf
                        <!-- Nom de la filière -->
                        <div>
                            <x-bladewind::input name="name" required='true' autofocus type="text"
                                placeholder="{{ __('Filière') }}" :value="old('name')" label="Filière"
                                prefix_is_icon="false" prefix_icon_css="text-gray-800" viewable="true" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>


                        <!-- Button -->
                        <div>
                            <x-bladewind::button can_submit="true" radius="medium" color="blue" has_spinner="true"
                                onclick="showButtonSpinner('.save-filiere')"
                                name="save-filiere">Crier</x-bladewind::button>
                        </div>
                    </form>
                </div>

                {{-- table --}}
                <x-bladewind::table searchable="true" striped="true" divider="thin" compact="true">

                    <x-slot name="header">
                        <th>Name</th>
                        <th class="flex justify-center">Action</th>
                    </x-slot>

                    @foreach ($filieres as $filiere)
                        <tr>
                            <td>{{ $filiere->name }}</td>
                            <td class="flex items-center justify-center gap-4">
                                {{-- edit button --}}
                                <x-bladewind::button.circle tag="a" href="{{ route('filieres.edit', $filiere) }}"
                                    color="green" outline icon="pencil-square"
                                    size="tiny"></x-bladewind::button.circle>

                                {{-- delete button --}}
                                <form action="{{ route('filieres.destroy', $filiere) }}" method="POST"
                                    onsubmit="return confirm('Vollez vous supprimer cette filière')">
                                    @csrf @method('DELETE')
                                    <x-bladewind::button can_submit="true" color="red" outline
                                        size="tiny">Delete</x-bladewind::button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </x-bladewind::table>
            </div>

        </div>
    </div>



</x-app-layout>
