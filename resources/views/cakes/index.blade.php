<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Cakes</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-orange-50">

@include('components.navbar')

<div class="max-w-7xl mx-auto py-10 px-6">

    <h1 class="text-4xl font-bold text-center mb-10">
        🎂 Explore Our Cakes
    </h1>

    <!-- Filters -->
    <form method="GET" action="{{ route('cakes.index') }}"
          class="grid md:grid-cols-4 gap-4 mb-10">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search cakes..."
            class="border rounded-lg p-3">

        <select
            name="category"
            class="border rounded-lg p-3">

            <option value="">All Categories</option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    @selected(request('category') == $category->id)>

                    {{ $category->name }}

                </option>

            @endforeach

        </select>

        <select
            name="sort"
            class="border rounded-lg p-3">

            <option value="">Sort By</option>

            <option value="low_high"
                @selected(request('sort') == 'low_high')>
                Price: Low → High
            </option>

            <option value="high_low"
                @selected(request('sort') == 'high_low')>
                Price: High → Low
            </option>

        </select>

        <button
            class="bg-orange-500 text-white rounded-lg hover:bg-orange-600">

            Search

        </button>

    </form>

    <!-- Cakes -->

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @forelse($cakes as $cake)

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">

                <img
                    src="{{ asset('uploads/cakes/'.$cake->image) }}"
                    class="w-full h-60 object-cover">

                <div class="p-6">

                    <h2 class="text-2xl font-bold">

                        {{ $cake->name }}

                    </h2>

                    <p class="text-gray-500 mt-2">

                        {{ Str::limit($cake->description,80) }}

                    </p>

                    <h3 class="text-orange-500 text-2xl font-bold mt-4">

                        ₹{{ $cake->price }}

                    </h3>

                    <div class="flex justify-between mt-6">

                        <a href="{{ route('cakes.show',$cake->id) }}"
                           class="bg-orange-500 text-white px-4 py-2 rounded-lg">

                            View

                        </a>

                        <form
                            action="{{ route('cart.add',$cake->id) }}"
                            method="POST">

                            @csrf

                            <button
                                class="bg-green-500 text-white px-4 py-2 rounded-lg">

                                Add Cart

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <h2 class="text-center text-2xl col-span-3">

                No Cakes Found 🍰

            </h2>

        @endforelse

    </div>

    <div class="mt-10">

        {{ $cakes->links() }}

    </div>

</div>

@include('components.footer')

</body>
</html>