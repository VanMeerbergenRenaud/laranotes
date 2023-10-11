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
                <div class="h-96 rounded-lg border-4 border-dashed border-gray-200">
                    <h1>Ma collection de livres</h1>
                    @forelse ($books as $book)
                        <article>
                            <h2>{{$book["title"]}}</h2>
                            <p>Écrit par : {{$book["author"] }}</p>
                        </article>
                    @empty
                        <p>Il n’y a pas de livre à afficher</p>
                    @endforelse
                </div>
            </div>
            <!-- /End replace -->
        </div>
    </main>
</x-layout>
