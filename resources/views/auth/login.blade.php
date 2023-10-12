<x-layout>
    <x-slot:title>
        <title>{{ $heading }}</title>
    </x-slot:title>

    <x-navigation />
    <x-header :heading="$heading" />
    <main>
        <div class="mx-auto max-w-2xl py-6 sm:px-6 lg:px-8">
            <form method="post" action="/login">
                @csrf
                <div class="space-y-8 mt-10">
                    <div class="border-b border-gray-300 pb-8">
                        <h2 class="text-2xl font-semibold leading-7 text-gray-900">Connexion à votre compte</h2>

                        <div class="mt-4 grid grid-cols-1 gap-6">
                            <div class="mt-4">
                                <label for="email" class="block text-sm font-medium text-gray-800">Adresse e-mail (requis)</label>
                                <div class="mt-1">
                                    <input type="text" id="email" name="email" value="" placeholder="jon@doe.com" class="block w-full rounded-md border-gray-300 text-gray-900 shadow-sm focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50 px-3 py-2 sm:text-sm">
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                            </div>
                            <div class="mt-4">
                                <label for="password" class="block text-sm font-medium text-gray-800">Mot de passe associé à l'adresse e-mail</label>
                                <div class="mt-1">
                                    <input type="password" value="<?= $password ?? '' ?>" id="password" name="password" rows="3" class="block w-full rounded-md border-gray-300 text-gray-900 shadow-sm focus:ring-2 focus:ring-indigo-600 focus:ring-opacity-50 px-3 py-2 sm:text-sm">
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-white text-sm font-semibold px-4 py-2 rounded-md shadow-sm">Connexion</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</x-layout>
