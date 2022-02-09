<x-albumes>
    <form action="{{ route('albumes.store', [], false) }}" method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="mb-6">
            <label for="titulo"
                class="text-sm font-medium text-gray-900 block mb-2 @error('titulo') text-red-500 @enderror">
                Título
            </label>
            <input type="text" name="titulo" id="titulo"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 @error('titulo') border-red-500 @enderror"
                value="{{ old('titulo', $album->titulo) }}">
            @error('titulo')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="autor"
                class="text-sm font-medium text-gray-900 block mb-2 @error('autor') text-red-500 @enderror">
                Autor
            </label>
            <input type="text" name="autor" id="autor"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 @error('autor') border-red-500 @enderror"
                value="{{ old('autor', $album->autor) }}">
            @error('autor')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="portada"
                class="text-sm font-medium text-gray-900 block mb-2 @error('portada') text-red-500 @enderror">
                Portada
            </label>
            <input type="file" name="portada" id="portada"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 @error('portada') border-red-500 @enderror"
                value="{{ old('portada', $album->portada) }}">
            @error('portada')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enviar</button>
    </form>
</x-albumes>
