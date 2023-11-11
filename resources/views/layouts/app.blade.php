<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200">
    <nav class="bg-white flex justify-between">
        <ul class="p-6 flex items-center">
            @guest
            <li>
                <a href="" class="p-3">Home</a>
            </li>
            @endguest
            @auth
            <li>
                <a href="" class="p-3">Dashboard</a>
            </li>
            @endauth
            <li>
                <a href="{{ route('product') }}" class="p-3">My Products</a>
            </li>
        </ul>
        <ul class="p-6 flex items-center">
            @auth
                <li>
                    <a href="" class="p-3">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="inline">
                        @csrf
                        <button type="submit" class="p-3">Logout</button>
                    </form>
                </li>
            @endauth
            @guest
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>

</html>
