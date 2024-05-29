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
                            <x-input-label for="name" :value="__('Matière')" />
                            <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                                :value="old('name')" required autofocus placeholder="Nom de Matière" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- filière -->
                        <div>
                            <x-flowbite.select id="name" label="Filière" name="filiere[]" multiple>
                                <option value="" disabled selected>Selectionnez filière</option>
                                @foreach ($filieres as $key => $filiere)
                                    <option class="py-4" value="{{ $key }}"> {{ $filiere }}</option>
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

                {{-- table --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nom de Matière
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Filières
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matieres as $matiere)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $matiere->name }}
                                    </th>

                                    <th scope="row"
                                        class="px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @foreach ($matiere->filieres as $filiere)
                                            <span
                                                class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $filiere->name }}</span>
                                        @endforeach
                                    </th>


                                    <td class="flex items-center gap-2 px-6 py-4">

                                        {{-- edit button --}}
                                        <a href="{{ route('matieres.edit', $matiere) }}"
                                            class="font-medium text-green-600 dark:text-green-500 hover:underline">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                class="w-6 h-6" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>

                                        {{-- delete button --}}
                                        <form action="{{ route('matieres.destroy', $matiere) }}" method="POST"
                                            onsubmit="return confirm('Vollez vous supprimer cette Matière')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-between py-4">
                        {{ $matieres->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>



</x-app-layout>
