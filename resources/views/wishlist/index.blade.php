<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wishlist</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-orange-50">

@include('components.navbar')

<div class="max-w-7xl mx-auto py-10 px-6">

<h1 class="text-4xl font-bold mb-8">

My Wishlist ❤️

</h1>

@forelse($wishlists as $wishlist)

<div class="bg-white rounded-xl shadow p-6 flex justify-between items-center mb-5">

<div class="flex items-center gap-5">

<img
src="{{ asset('uploads/cakes/'.$wishlist->cake->image) }}"
class="w-24 h-24 rounded-lg object-cover">

<div>

<h2 class="text-2xl font-bold">

{{ $wishlist->cake->name }}

</h2>

<p class="text-orange-600">

₹{{ $wishlist->cake->price }}

</p>

</div>

</div>

<form action="{{ route('wishlist.remove',$wishlist->id) }}"
method="POST">

@csrf
@method('DELETE')

<button class="bg-red-500 text-white px-4 py-2 rounded">

Remove

</button>

</form>

</div>

@empty

<h2 class="text-center text-2xl">

Wishlist Empty ❤️

</h2>

@endforelse

</div>

@include('components.footer')

</body>
</html>