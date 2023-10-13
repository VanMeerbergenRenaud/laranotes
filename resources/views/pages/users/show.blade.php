<x-layout>
    <x-slot:title>
        <title>{{ $heading }}</title>
    </x-slot:title>

    <x-navigation />
    <x-header :heading="$heading" />
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <div class="bg-white rounded-lg p-8 shadow-md">
                    <h2 class="text-xl font-semibold mb-4">{{ $user->name }}</h2>
                    <p class="text-l">{{ $user->email }}</p>
                </div>
                <div class="mt-6 flex items-center">
                    <form action="/users/{{ $user->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-md" type="submit">
                            Delete this account
                        </button>
                    </form>
                    <a href="/users/{{ $user->id }}/edit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-md ml-2">Edit this account profil</a>
                </div>
                <div class="mt-6">
                    <a href="/users" class="text-blue-500 hover:underline">View all the users</a>
                </div>
            </div>
        </div>
    </main>
</x-layout>
