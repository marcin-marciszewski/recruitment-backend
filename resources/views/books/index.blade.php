<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <x-card class="p-10 max-w-4xl mx-auto">
        @if(app('request')->input('search') || app('request')->input('category'))
        <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Wróc
        </a>
        @endif
        <table class="w-full table-auto rounded-sm ">
            <tbody>
                @unless($books->isEmpty())
                @foreach($books as $book)

                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg flex flex-col">
                        <a href="/books/{{$book->id}}">
                            {{$book->title}}
                        </a>
                        <span class="book-author">{{$book->author}}</span>
                        @foreach($categories as $category)
                        @if($book->category_id == $category->id)
                        <a href="/?category={{ $book->category_id}}"><span class="bg-black w-fit text-white rounded-xl px-3 py-1">{{$category->name}}</span></a>
                        @endif
                        @endforeach
                        </li>
                    </td>
                    @auth
                    <td class="py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/books/{{$book->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i>
                            Edytuj</a>
                    </td>
                    <td class=" py-8 border-t border-b border-gray-300 text-lg">
                        <form action="/books/{{$book->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500"><i class="fa-solid fa-trash"></i>Usuń</button>
                        </form>
                    </td>
                    @endauth
                </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b">
                        <p class="text-center">Brak książek</p>
                    </td>
                </tr>
                @endunless
            </tbody>
        </table>
    </x-card>


    <div class="mt-6 p-4 max-w-4xl mx-auto">
        {{$books->links()}}
    </div>
</x-layout>