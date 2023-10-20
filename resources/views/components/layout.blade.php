<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>Zarządzaj książkami</title>
</head>

<body>
    <nav class="flex bg-slate-400 text-white justify-between items-center">
        <a href="/"><img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo coursor" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
            <li>
                <span class="font-bold uppercase">
                    Witaj {{auth()->user()->name}}
                </span>
            </li>
            <li>
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i>
                        Wyloguj
                    </button>
                </form>
            </li>
            @else
            <li>
                <a href="/register" class="hover:text-laravel">
                    <i class="fa-solid fa-user-plus"></i>
                    Rejestracja
                </a>
            </li>
            <li>
                <a href="/login" class="hover:text-laravel">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Zaloguj
                </a>
            </li>
            @endauth
        </ul>
    </nav>
    <main>
        {{$slot}}
    </main>
    <footer class="bottom-0 left-0 w-full flex items-center justify-start font-bold bg-slate-400 text-white h-24 mt-6 opacity-90 md:justify-center">
        <p class="ml-2">Wszystkie prawa zastrzeżone &copy; <span x-text="new Date().getFullYear()"></span></p>
        @auth
        <a href="/books/create" class="rounded ml-3 top-1/3 right-10 bg-black text-white py-2 px-5">Dodaj książkę</a>
        @endauth
    </footer>

    <x-flash-message />
</body>

</html>