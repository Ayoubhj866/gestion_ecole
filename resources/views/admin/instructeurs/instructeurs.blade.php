<x-app-layout>

    {{-- Heading --}}
    <x-flowbite.title>
        <span>
            Liste des Instructeurs
        </span>
    </x-flowbite.title>

    <div
        class="flex items-center justify-end gap-4 p-4 border-gray-200 border-dashed rounded-lg text-end mt-4border-2 dark:border-gray-700">
        <x-bladewind.button name="new-eleve" tag="a" href="{{ route('students.create') }}" has_spinner="true"
            color="black" class="float-end" can_submit="true" onclick="showButtonSpinner('.new-eleve')">
            {{ __('Ajouter un Instructeur') }} </x-bladewind.button>

        <x-bladewind::dropmenu>
            <x-slot:trigger>
                <x-bladewind.button type="primary" icon="arrow-down-on-square-stack" icon_right="true">
                    Export
                </x-bladewind.button>
            </x-slot:trigger>
            <x-bladewind::dropmenu-item class="">
                <a href="{{ route('export_excel', 'instructeurs') }}" target="_black">Export excel</a>
            </x-bladewind::dropmenu-item>
            <x-bladewind::dropmenu-item>
                <a href="{{ route('export_pdf', 'instructeurs') }}" target="_black">Export Pdf</a>
            </x-bladewind::dropmenu-item>
        </x-bladewind::dropmenu>
    </div>


    {{-- table --}}
    <div class="overflow-auto">
        <x-bladewind::table searchable="true" striped="true" divider="thin" compact="false"
            no_data_message="No instructeur trouvé" message_as_empty_state="true"
            search_placeholder="Find staff members by name...">

            <x-slot name="header">
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Tel</th>
                <th class="flex justify-center">Action</th>
            </x-slot>

            @foreach ($instructeurs as $instructeur)
                <tr>
                    <td>{{ $instructeur->nom }}</td>
                    <td>{{ $instructeur->prenom }}</td>
                    <td>{{ $instructeur->email }}</td>
                    <td>{{ $instructeur->tel }}</td>
                    <td class="flex items-center justify-center gap-4">
                        {{-- edit button --}}
                        <x-bladewind::button.circle tag="a" href="{{ route('instructeurs.edit', $instructeur) }}"
                            color="green" outline icon="pencil-square" size="tiny"></x-bladewind::button.circle>

                        {{-- delete button --}}
                        <form action="{{ route('instructeurs.destroy', $instructeur) }}" method="POST"
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


</x-app-layout>
