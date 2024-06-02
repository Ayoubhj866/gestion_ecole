<x-app-layout>

    <x-flowbite.title>
        Matières
    </x-flowbite.title>

    <div class="p-4 border-gray-200 border-dashed rounded-lg mt-4border-2 dark:border-gray-700">
        <div class="mt-2">

            <div class="grid gap-4 px-8 py-4 bg-white grid-col md:grid-cols-2 dark:bg-gray-800">
                {{-- form create --}}
                <div class="max-w-sm">
                    <form action="{{ route('matieres.store') }}" method="POST" class="p-4 space-y-4 ">
                        @csrf
                        <!-- nom de matière -->
                        <div>
                            <x-bladewind::input name="name" required='true' autofocus type="text"
                                placeholder="{{ __('Matière') }}" :value="old('name')" label="Full name"
                                prefix_is_icon="false" prefix_icon_css="text-gray-800" viewable="true" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- filières -->
                        <div>
                            <x-bladewind::select name="filieres" searchable="true" label_key="filiere" value_key="key"
                                multiple="true" :selected_value="old('filieres')" :data="$filieres" />
                            <x-input-error :messages="$errors->get('filieres')" class="mt-2" />
                        </div>

                        <!-- Button -->
                        <div>
                            <x-bladewind::button name="save-matiere" has_spinner="true"
                                onclick="showButtonSpinner('.save-matiere')" can_submit='true'
                                color="blue">Crier</x-bladewind::button>
                        </div>
                    </form>
                </div>
                <x-bladewind::table searchable='true' striped="true" divider="thin" compact="true">

                    <x-slot name="header">
                        <th>Name</th>
                        <th class="flex justify-center">Action</th>
                    </x-slot>
                    @foreach ($matieres as $matiere)
                        <tr>
                            <td>{{ $matiere->name }}</td>
                            <td class="flex items-center justify-center gap-4">
                                {{-- edit button --}}
                                <x-bladewind::button.circle tag="a" href="{{ route('matieres.edit', $matiere) }}"
                                    color="green" outline icon="pencil-square"
                                    size="tiny"></x-bladewind::button.circle>

                                {{-- delete button --}}
                                <form action="{{ route('matieres.destroy', $matiere) }}" method="POST"
                                    onsubmit="return confirm('Vollez vous supprimer cette matiere')">
                                    @csrf
                                    @method('DELETE')
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

    {{-- Confirm delete modal --}}
    <x-bladewind::modal size="big" center_action_buttons="true" type="warning" title="Confirm User Deletion"
        ok_button_action="confirmDeletion()" cancel_button_action="close" close_after_action="false"
        name="delete-matiere" ok_button_label="Yes, delete" cancel_button_label="don't delete">
        Vous êtes sur de supprimer cette matière ?
    </x-bladewind::modal>

    @section('scripts')
        <script>
            function confirmDeletion() {
                return domEl('.delete-matiere').submit();
            }
        </script>
    @endsection
</x-app-layout>
