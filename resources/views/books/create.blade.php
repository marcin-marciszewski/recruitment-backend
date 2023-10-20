@php
$currentYear = date("Y");
@endphp
<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Dodaj nową książkę
            </h2>
        </header>

        <form method="post" action="/books">
            @csrf
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Tytuł</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{old('title')}}" />

                @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="author" class="inline-block text-lg mb-2">Autor</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="author" value="{{old('author')}}" />

                @error('author')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="issue_year" class="inline-block text-lg mb-2">Rok wydania</label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="issue_year" max="{{$currentYear}}" step="1" value="{{$currentYear}}" />

                @error('issue_year')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="category_id" class="inline-block text-lg mb-2">Kategoria</label>
                <select class="border border-gray-200 rounded p-2 w-full" name="category_id">
                    @if($categories->count())
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ $category->id == old('category_id') ? 'selected="selected"' : '' }}>{{$category->name}}</option>
                    @endforeach
                    @endif
                </select>

                @error('category_id')
                <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="stock" class="inline-block text-lg mb-2">
                    Ilość
                </label>
                <input type="number" min="0" class="border border-gray-200 rounded p-2 w-full" name="stock" value="{{old('stock')}}" />

                @error('stock')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Opis
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10">{{old('description')}}</textarea>

                @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Dodaj
                </button>

                <a href="/" class="text-black ml-4"> Wróć </a>
            </div>
        </form>
    </x-card>
</x-layout>