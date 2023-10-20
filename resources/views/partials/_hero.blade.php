<section class="relative h-72 bg-black flex flex-col justify-center align-center text-center space-y-4 mb-4">
    <div class="absolute top-0 left-0 w-full h-full opacity-80 bg-no-repeat bg-center" style="background-image: url('images/books.jpg')"></div>

    <div class="z-10">
        <h1 class="text-6xl font-bold uppercase text-white">
            Zarządzaj<span class="text-black"> Książkami</span>
        </h1>
        <p class="text-2xl text-gray-200 font-bold my-4">

        </p>
        @auth
        <div>
            <a href="/books/create" class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">Dodaj nową książkę</a>
        </div>
        @endauth
    </div>
</section>