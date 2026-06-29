<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempting Bites</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-orange-50">

<nav class="bg-white shadow-md sticky top-0 z-50">

    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">

        <h1 class="text-3xl font-bold text-orange-600">
            🎂 Tempting Bites
        </h1>

        <div class="space-x-8 font-medium">
            <a href="#" class="hover:text-orange-600">Home</a>
            <a href="#" class="hover:text-orange-600">Cakes</a>
            <a href="#" class="hover:text-orange-600">Categories</a>
            <a href="#" class="hover:text-orange-600">About</a>
            <a href="#" class="hover:text-orange-600">Contact</a>
        </div>

        <div class="space-x-3">
            <a href="{{ route('login') }}"
               class="px-5 py-2 border border-orange-500 rounded-lg text-orange-600 hover:bg-orange-100">
                Login
            </a>

            <a href="{{ route('register') }}"
               class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-lg">
                Register
            </a>
        </div>

    </div>

</nav>

</body>
</html>