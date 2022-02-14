<x-albumes>
    <table class="table-auto">
        <thead>
            <th class="px-6 py-2 text-gray-500">
                Portada
            </th>
            <th class="px-6 py-2 text-gray-500">
                Título
            </th>
            <th class="px-6 py-2 text-gray-500">
                Autor
            </th>
            <th class="px-6 py-2 text-gray-500">
                Descargar portada
            </th>
        </thead>
        <tbody>
            @foreach ($albumes as $album)
                <tr>
                    <td><img width="100" src="{{ asset('storage/portadas/' . $album->id . '.jpg') }}"/></td>
                    <td>{{ $album->titulo }}</td>
                    <td>{{ $album->autor }}</td>
                    <td>
                        <a href="{{ route('albumes-descargar', [$album]) }}" type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-2 py-1 text-center">Descargar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-albumes>
