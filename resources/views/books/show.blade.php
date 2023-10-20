<x-layout>

    <div class="mx-4">
        <x-card class="p-10">
            <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Wróc
            </a>
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6" src="{{asset('images/book.png')}}" alt="" />

                <h3 class="text-2xl mb-2">{{$book->title}} ({{$book->issue_year}})</h3>
                <div class="text-xl font-bold mb-4">{{$book->author}}</div>
                <ul class="flex">
                    <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
                        <a href="/?category={{$category->id}}">{{$category->name}}</a>
                    </li>

                </ul>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-arrow-trend-up"></i> Dostępnych egzemplarzy: {{$book->stock}}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Opis
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>
                            {{$book->description}}
                        </p>
                        @auth
                        <div class="flex items-end justify-center">
                            <a href="/books/{{$book->id}}/edit" class="block bg-laravel text-white mt-6 py-2  px-8 mr-2 rounded-xl hover:opacity-80"><i class="fa-solid fa-envelope"></i>
                                Edytuj</a>


                            <form action="/books/{{$book->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="block bg-black text-white  py-2 px-10 rounded-xl hover:opacity-80"><i class="fa-solid fa-trash"></i>Usuń</button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </x-card>
    </div>
</x-layout>