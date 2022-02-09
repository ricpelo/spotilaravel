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
        </thead>
        <tbody>
            @foreach ($albumes as $album)
                <tr>
                    <td><img width="100" src="{{ asset('storage/portadas/' . $album->id . '.jpg') }}"/></td>
                    <td>{{ $album->titulo }}</td>
                    <td>{{ $album->autor }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-albumes>
