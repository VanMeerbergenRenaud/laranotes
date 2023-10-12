<x-layout>
    <x-slot:title>
        <title>{{ $heading }}</title>
    </x-slot:title>

    <x-navigation />
    <x-header :heading="$heading" />
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Replace with your content -->
            <div class="px-4 py-6 sm:px-0">
                <div class="rounded-lg border-4 border-dashed border-gray-200 p-6 shadow-lg">
                    <h1 class="text-3xl font-semibold mb-4">Ma Collection de Livres 📚</h1>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @forelse ($books as $book)
                            <div class="bg-gray-100 p-4 rounded-lg border border-gray-300">
                                <h2 class="text-xl font-semibold mb-2">{{$book["title"]}}</h2>
                                <p class="text-gray-600">Écrit par : {{$book["author"] }}</p>
                            </div>
                        @empty
                            <p class="text-gray-600 mt-4">Il n'y a pas de livre à afficher pour le moment. 📕</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <!-- /End replace -->
        </div>
    </main>
</x-layout>
