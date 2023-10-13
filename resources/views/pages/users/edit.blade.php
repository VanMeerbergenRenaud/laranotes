<x-layout>
    <x-slot:title>
        <title>{{ $heading }}</title>
    </x-slot:title>

    <x-navigation />
    <x-header :heading="$heading" />
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            @can('manage-users', $user)
                <h1 class="text-2xl font-semibold text-gray-900 border-b border-gray-200 mb-4 pb-4">Vous pouvez éditer votre profil</h1>
            @endcan
            <form method="post" action="/users/{{$user->id}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="space-y-8">
                    <div class="border-b border-gray-200 pb-8">
                        <h2 class="text-xl font-semibold text-gray-900">Modifier le profil</h2>
                        <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-3">
                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-900">Nom de l'utilisateur</label>
                                <input name="name" id="name" type="text">
                                @error('name')
                                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-3">
                                <label for="email" class="block text-sm font-medium text-gray-900">Email du profil</label>
                                <input name="email" id="email" type="email">
                                @error('email')
                                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="password" class="block text-sm font-medium text-gray-900">Mot de passe</label>
                                <input name="password" id="password" type="password">
                                @error('password')
                                <div class="mt-2 text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="px-4 py-2 mt-4 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:ring focus:ring-indigo-600 focus:ring-opacity-50 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-offset-opacity-50">Mettre à jour le profil</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</x-layout>
