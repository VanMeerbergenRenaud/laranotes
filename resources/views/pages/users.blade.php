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
                <div class="rounded-lg border-4 border-dashed border-gray-200">
                    <h1 class="mx-auto max-w-7xl py-6 pl-4 text-2xl font-bold">Page des utilisateurs</h1>
                    <ul>
                        @foreach ($users as $user)
                            <li class="p-4 border-b border-gray-300">
                                <div class="font-semibold">Utilisateur: {{ $user->id }}</div>
                                <div class="mt-2">Name: {{ $user->name }}</div>
                                <div class="mb-2">Email: {{ $user->email }}</div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- /End replace -->
        </div>
    </main>
</x-layout>
