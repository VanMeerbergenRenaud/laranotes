<x-layout>
    <x-slot:title>
        <title>{{ $heading }}</title>
    </x-slot:title>

    <x-navigation/>
    <x-header :heading="$heading"/>
    <main>
        <div class="mx-auto max-w-6xl py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <h2 class="text-2xl font-semibold mb-10 text-gray-800">List of my notes</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6 mt-4">
                    @forelse($user->notes as $note)
                        <a href="/notes/{{ $note->id }}" class="hover:no-underline">
                            <article class="bg-white p-6 rounded-lg shadow-md">
                                <p class="text-blue-500 text-lg font-semibold">{{ $note->description }}</p>
                            </article>
                        </a>
                    @empty
                        <div class="text-center">
                            <p class="text-gray-600">It seems that you haven't posted any note yet.</p>
                            <a href="/notes/create" class="text-blue-500 underline">Create one</a>
                        </div>
                    @endforelse
                </div>
                <div class="mt-10 text-center">
                    <a href="/notes/create" class="text-blue-500 text-lg font-semibold underline">Create a new note</a>
                </div>
            </div>
        </div>
    </main>
</x-layout>
