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
                    <p>{{ htmlspecialchars($note->description) }}</p>
                </div>
                <p>
                    Create by : {{ $note->user->name }}
                </p>
                <div>
                    <form action="/notes/{{ $note->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete this note</button>
                    </form>
                    <a href="/notes/{{ $note->id }}/edit">Edit this note</a>
                </div>
                <div>
                    <a href="/notes">View all your notes</a>
                </div>
            </div>
            <!-- /End replace -->
        </div>
    </main>
</x-layout>
