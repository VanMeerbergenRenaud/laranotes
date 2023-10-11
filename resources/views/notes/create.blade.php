<x-layout>
    <x-slot:title>
        <title>{{ $heading }}</title>
    </x-slot:title>

    <x-navigation/>
    <x-header :heading="$heading"/>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <form method="post" action="/notes" enctype="multipart/form-data">
                @csrf {{-- Sinon erreur 419 : Page expired à la soumission du formulaire --}}
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Create a new note</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Write something beautiful.</p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <div class="col-span-full">
                                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">
                                    {{ __('forms.note_description') }} (can't be empty)
                                </label>
                                <div class="mt-2">
                                    <textarea id="description" name="description" rows="3" class="block px-1.5 w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"><?= $_SESSION['old']['description'] ?? '' ?></textarea>
                                </div>
                                {{-- Validation --}}
                                @error('description')
                                    <div>
                                        <div class="alert text-red-500">{{ $message }}</div>
                                    </div>
                                @enderror

                            </div>
                            <div class="col-span-full">
                                <label for="image_url">Thumbnail</label>
                                <input type="file" name="image_url" id="image_url">
                                {{-- Validation --}}
                                @error('image_url')
                                    <div>
                                        <div class="alert text-red-500">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>
                            <div class="flex gap-x-6">
                                <button type="submit" class="rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add the new note</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</x-layout>
