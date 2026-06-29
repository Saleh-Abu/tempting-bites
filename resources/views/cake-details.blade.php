<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>{{ $cake->name }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-orange-50">

@include('components.navbar')
@if(session('success'))
    <div class="max-w-7xl mx-auto mt-6">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    </div>
@endif

<div class="max-w-7xl mx-auto py-16 px-6">

<div class="grid md:grid-cols-2 gap-12">

<div>

<img
src="{{ asset('uploads/cakes/'.$cake->image) }}"
class="rounded-3xl shadow-xl w-full">

</div>

<div>

<h1 class="text-5xl font-bold">

{{ $cake->name }}

</h1>

<p class="text-gray-600 mt-6">

{{ $cake->description }}

</p>

<div class="mt-6 space-y-3">

<p>

<strong>Flavour:</strong>

{{ $cake->flavour }}

</p>

<p>

<strong>Weight:</strong>

{{ $cake->weight }}

</p>

<p>

<strong>Egg Type:</strong>

{{ $cake->egg_type }}

</p>

<p>

<strong>Stock:</strong>

{{ $cake->stock }}

</p>

</div>

<h2 class="text-orange-600 text-4xl font-bold mt-8">

₹{{ $cake->price }}

</h2>

<div class="mt-10 flex gap-4">

<form action="{{ route('cart.add',$cake->id) }}"
      method="POST">

    @csrf

    <button
        class="bg-orange-500 text-white px-8 py-4 rounded-xl">

        Add To Cart

    </button>

</form>

<button
class="border border-orange-500 text-orange-600 px-8 py-4 rounded-xl">

❤ Wishlist

</button>

</div>

</div>

</div>

</div>
  <div class="max-w-7xl mx-auto px-6 pb-16">

    <h2 class="text-3xl font-bold mb-6">
        Customer Reviews
    </h2>

    @auth

    <form action="{{ route('reviews.store',$cake->id) }}" method="POST">

        @csrf

        <div class="mb-4">

            <label class="font-semibold">
                Rating
            </label>

            <select
                name="rating"
                class="w-full border rounded-lg p-3 mt-2">

                <option value="5">⭐⭐⭐⭐⭐</option>
                <option value="4">⭐⭐⭐⭐</option>
                <option value="3">⭐⭐⭐</option>
                <option value="2">⭐⭐</option>
                <option value="1">⭐</option>

            </select>

        </div>

        <div class="mb-5">

            <textarea
                name="review"
                rows="4"
                placeholder="Write your review..."
                class="w-full border rounded-lg p-3"></textarea>

        </div>

        <button
            class="bg-orange-500 text-white px-8 py-3 rounded-lg">

            Submit Review

        </button>

    </form>

    @endauth

    <div class="mt-10">

        @forelse($cake->reviews as $review)

        <div class="bg-white shadow rounded-xl p-5 mb-5">

            <h3 class="font-bold">

                {{ $review->user->name }}

            </h3>

            <p class="text-yellow-500 mt-2">

                {{ str_repeat('⭐',$review->rating) }}

            </p>

            <p class="mt-3">

                {{ $review->review }}

            </p>

            @if(auth()->check() && (auth()->id()==$review->user_id || auth()->user()->is_admin))

            <form
                action="{{ route('reviews.destroy',$review->id) }}"
                method="POST"
                class="mt-4">

                @csrf
                @method('DELETE')

                <button class="text-red-500">

                    Delete

                </button>

            </form>

            @endif

        </div>

        @empty

        <p>

            No reviews yet.

        </p>

        @endforelse

    </div>

</div>

@include('components.footer')

</body>

</html>