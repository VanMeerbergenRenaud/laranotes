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
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                    @forelse ($users as $user)
                        <div class="bg-white rounded-lg shadow-md p-4">
                            <h2 class="text-lg font-semibold mt-4">{{ $user->name }}</h2>
                            <p class="text-gray-500">{{ $user->email }}</p>
                            <div class="mt-4">
                                <a href="/users/{{ $user->id }}" class="text-blue-500 hover:underline">View Profile</a>
                            </div>
                        </div>
                    @empty
                        <p>There are no users yet</p>
                    @endforelse
                </div>
            </div>
            <!-- /End replace -->
        </div>
    </main>
</x-layout>
