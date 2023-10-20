@php
$currentYear = date("Y");
@endphp
<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edytuj: {{$book->title}}
            </h2>
        </header>

        <form method="post" action="/books/{{$book->id}}">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Tytuł</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{$book->title}}" />

                @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="author" class="inline-block text-lg mb-2">Autor</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="author" value="{{$book->author}}" />

                @error('author')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="issue_year" class="inline-block text-lg mb-2">Rok wydania</label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="issue_year" max="{{$currentYear}}" step="1" value="{{$book->issue_year}}" />

                @error('issue_year')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="category_id" class="inline-block text-lg mb-2">Kategoria</label>
                <select class="border border-gray-200 rounded p-2 w-full" name="category_id">
                    @if($categories->count())
                    @foreach($categories as $category)
                    <option {{ $category->id == $book->category_id ? 'selected="selected"' : '' }} value="{{$category->id}}">{{$category->name}}</option>
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
                <input type="number" min="0" class="border border-gray-200 rounded p-2 w-full" name="stock" value="{{$book->stock}}" />

                @error('stock')
                <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Opis
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10">{{$book->description}} </textarea>

                @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Zapisz
                </button>

                <a href="/books/{{$book->id}}" class="text-black ml-4">Wróć </a>
            </div>
        </form>
    </x-card>
</x-layout>