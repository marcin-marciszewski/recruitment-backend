<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Zarejestruj się
            </h2>
        </header>

        <form action="/users" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                    Imię i Nazwisko
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{old('name')}}" />

                @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Hasło
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />

                @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password2" class="inline-block text-lg mb-2">
                    Powtórz hasło
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" />
                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Zarejestruj
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Masz już konto?
                    <a href="/login" class="text-laravel">Zaloguj</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>