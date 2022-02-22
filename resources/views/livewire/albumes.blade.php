<div>
    <div class="container mx-auto mt-4">
        <div class="flex flex-1 flex-col items-center">
            @if (session()->has('error'))
                <div class="bg-red-100 rounded-lg p-4 mt-4 mb-4 text-sm text-red-700"
                    role="alert">
                    <span class="font-semibold">Error:</span>
                    {{ session('error') }}
                </div>
            @endif

            @if (session()->has('success'))
                <div class="bg-green-100 rounded-lg p-4 mt-4 mb-4 text-sm text-green-700"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table-auto">
                <thead>
                    <th class="px-6 py-2 text-gray-500">
                        Título
                    </th>
                    <th class="px-6 py-2 text-gray-500">
                        Autor
                    </th>
                    <th class="px-6 py-2 text-gray-500">
                        Borrar
                    </th>
                </thead>
                <tbody>
                    @foreach ($albumes as $album)
                        <tr>
                            <td>{{ $album->titulo }}</td>
                            <td>{{ $album->autor }}</td>
                            <td>
                                <button wire:click="borrar({{ $album->id }})" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-2 py-1 text-center">Borrar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
