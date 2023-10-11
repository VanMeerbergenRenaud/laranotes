<x-layout>
    <x-slot:title>
        <title>{{ $heading }}</title>
    </x-slot:title>

    <x-navigation/>
    <x-header :heading="$heading"/>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Replace with your content -->
            <div class="px-4 py-6 sm:px-0">
                <div class="h-96 rounded-lg border-4 border-dashed border-gray-200">
                    @forelse($user->notes as $note)
                        <article>
                            <p>
                                <a class="underline text-blue-500"
                                   href="/notes/{{ $note->id }}">
                                    {{ $note->description }}
                                </a>
                            </p>
                        </article>
                    @empty
                        <p>It seems that you haven't posted any note yet. Would you like to
                            <a href="/notes/create" class="text-blue-500 underline">create one</a> ?
                        </p>
                    @endforelse
                </div>
                <div><a class="text-blue-500 underline" href="/notes/create">Create a new note</a></div>
            </div>
            <!-- /End replace -->
        </div>
    </main>
</x-layout>
