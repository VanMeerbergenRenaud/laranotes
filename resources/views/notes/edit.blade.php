<x-layout>
    <x-slot:title>
        <title>{{ $heading }}</title>
    </x-slot:title>

    <x-navigation />
    <x-header :heading="$heading" />
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            @can('handle-note', $note)
                <h1 class="text-2xl font-semibold text-gray-900 border-b border-gray-200 mb-4 pb-4">Vous pouvez éditer la note</h1>
            @endcan
            <form method="post" action="/notes/{{$note->id}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="space-y-8">
                    <div class="border-b border-gray-200 pb-8">
                        <h2 class="text-xl font-semibold text-gray-900">Modifier la note</h2>
                        <p class="mt-2 text-sm text-gray-600">Améliorez votre note.</p>
                        <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-3">
                            <div class="sm:col-span-3">
                                <label for="description" class="block text-sm font-medium text-gray-900">Description de la note</label>
                                <div class="mt-2">
                                    <textarea id="description" name="description" rows="4" class="block p-4 w-full border-gray-300 rounded-md shadow-sm text-gray-900 focus:ring focus:ring-indigo-600 focus:ring-opacity-50 focus:ring-offset-1 focus:ring-offset-gray-100 focus:ring-offset-opacity-50 placeholder-gray-400 sm:text-sm sm:leading-5">{{ $note->description }}</textarea>
                                </div>
                                @error('description')
                                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="image_url" class="block text-sm font-medium text-gray-900">Image miniature</label>
                                <input type="file" name="image_url" id="image_url" class="mt-2 d-inline-block rounded-md text-gray-900 focus:ring focus:ring-indigo-600 focus:ring-opacity-50 focus:ring-offset-1 focus:ring-offset-gray-100 focus:ring-offset-opacity-50">
                                @error('image_url')
                                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="px-4 py-2 mt-4 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:ring focus:ring-indigo-600 focus:ring-opacity-50 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-offset-opacity-50">Mettre à jour la note</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</x-layout>
