<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-orange-50">

@include('components.navbar')

<div class="max-w-7xl mx-auto py-10 px-6">

    <h1 class="text-4xl font-bold text-center mb-10">
        🍰 Cake Categories
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @forelse($categories as $category)

            <a href="{{ route('cakes.index', ['category' => $category->id]) }}">

                <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition overflow-hidden">

                    @if($category->image)

                        <img
                            src="{{ asset('uploads/categories/'.$category->image) }}"
                            class="w-full h-56 object-cover">

                    @else

                        <img
                            src="https://placehold.co/600x400?text=Category"
                            class="w-full h-56 object-cover">

                    @endif

                    <div class="p-6">

                        <h2 class="text-2xl font-bold">
                            {{ $category->name }}
                        </h2>

                        <p class="text-gray-500 mt-2">
                            {{ $category->description }}
                        </p>

                        <div class="mt-4 text-orange-500 font-bold">
                            {{ $category->cakes_count }} Cakes
                        </div>

                    </div>

                </div>

            </a>

        @empty

            <h2 class="text-center text-2xl col-span-3">
                No Categories Found
            </h2>

        @endforelse

    </div>

</div>

@include('components.footer')

</body>
</html>