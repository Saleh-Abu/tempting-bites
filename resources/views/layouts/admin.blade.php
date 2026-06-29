<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempting Bites Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    @include('components.admin.sidebar')

    {{-- Main Content --}}
    <div class="flex-1">

        {{-- Topbar --}}
        @include('components.admin.topbar')

        <main class="p-8">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>