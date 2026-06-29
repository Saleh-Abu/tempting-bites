<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempting Bites</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-orange-50">

    @include('components.navbar')

    @include('components.hero')
    
    @include('components.search-filter')

    @include('components.categories')

    @include('components.featured-cakes')

    @include('components.reviews')  

    @include('components.why-choose-us')

    @include('components.footer')

</body>
</html>
