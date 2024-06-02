<x-app-layout>

    {{-- Heading --}}
    <x-flowbite.title>
        <span>
            Liste des Eleves
        </span>
    </x-flowbite.title>

    <div class="p-4 border-gray-200 border-dashed rounded-lg text-end mt-4border-2 dark:border-gray-700">
        <x-bladewind.button name="new-eleve" tag="a" href="{{ route('students.create') }}" has_spinner="true"
            color="black" class="float-end" can_submit="true" class="mt-3" onclick="showButtonSpinner('.new-eleve')">
            {{ __('Ajouter un eleve') }} </x-bladewind.button>
    </div>


    {{-- table --}}
    <div class="overflow-auto">
        <x-bladewind::table searchable="true" striped="true" divider="thin" compact="true"
            no_data_message="No eleve trouvé" message_as_empty_state="true"
            search_placeholder="Find staff members by name...">

            <x-slot name="header">
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Filière</th>
                <th class="flex justify-center">Action</th>
            </x-slot>

            @foreach ($eleves as $eleve)
                <tr>
                    <td>{{ $eleve->nom }}</td>
                    <td>{{ $eleve->prenom }}</td>
                    <td>{{ $eleve->email }}</td>
                    <td>
                        <span
                            class="bg-gray-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-700 dark:text-blue-300">{{ $eleve->filiere->name }}</span>
                    </td>
                    <td class="flex items-center justify-center gap-4">
                        {{-- edit button --}}
                        <x-bladewind::button.circle tag="a"
                            href="{{ route('students.edit', ['student' => $eleve]) }}" color="green" outline
                            icon="pencil-square" size="tiny"></x-bladewind::button.circle>

                        {{-- delete button --}}
                        <form action="{{ route('students.destroy', $eleve) }}" method="POST"
                            onsubmit="return confirm('Vollez vous supprimer cette filière')">
                            @csrf @method('DELETE')
                            <x-bladewind::button can_submit="true" color="red" outline
                                size="tiny">Delete</x-bladewind::button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </x-bladewind::table>

        <div class="px-4 py-4">
            {{ $eleves->links() }}
        </div>

    </div>

    </div>


</x-app-layout>
