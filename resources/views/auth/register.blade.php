<x-layout>
    <x-slot:title>
        <title>{{ $heading }}</title>
    </x-slot:title>

    <x-navigation/>
    <x-header :heading="$heading"/>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <form method="post" action="/register">
                @csrf
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Register for a new account</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">We promise we won't share your email address
                            with no one.</p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <div class="col-span-full">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Your name
                                    (at least two characters, we'll check if it already exists when you submit the
                                    form)</label>
                                <div class="mt-2">
                                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                                           placeholder="Jon Doe"
                                           class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 px-1.5 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6">
                                </div>
                                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                            </div>
                            <div class="col-span-full">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">A valid
                                    email address (required)</label>
                                <div class="mt-2">
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                           placeholder="jon@doe.com"
                                           class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 px-1.5 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6">
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                            </div>
                            <div class="col-span-full">
                                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">A strong
                                    password of at least 8 characters including one number, one capital letter and one
                                    symbol <br>no idea ? Here is one generated for you. We've not memorized it
                                    : {{ $suggested_password }}</label>
                                <div class="mt-2">
                                    <input type="password" id="password" name="password" rows="3"
                                           class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 px-1.5 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6">
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                            </div>
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Repeat your password</label>
                                <div class="mt-2">
                                    <input type="password" id="password_confirmation" name="password_confirmation" rows="3"
                                           class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 px-1.5 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6">
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <div class="mt-6 flex items-center gap-x-6">
                                <button type="submit"
                                        class="rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Create my account
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</x-layout>
