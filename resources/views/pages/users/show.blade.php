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
                    <p class="text-l">Password : <sub>*************</sub></p>
                </div>
                <div class="mt-6 flex items-center">
                    @if ($user->isSuspended())
                        <form action="{{ route('users.unsuspend', $user) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-md ml-2">Réactiver</button>
                        </form>
                    @else
                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-md">Suspendre</button>
                        </form>
                    @endif
                </div>
                <div class="mt-6">
                    <a href="/users" class="text-blue-500 hover:underline">View all the users</a>
                </div>
            </div>
        </div>
    </main>
</x-layout>
