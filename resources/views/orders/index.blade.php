<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>My Orders</title>

@vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-orange-50">

@include('components.navbar')

<div class="max-w-6xl mx-auto py-10">

<h1 class="text-4xl font-bold mb-8">

My Orders

</h1>

@forelse($orders as $order)

<div class="bg-white rounded-xl shadow p-6 mb-6">

<h2 class="text-2xl font-bold">

Order #{{ $order->id }}

</h2>

<p class="mt-3">

Status :

<span class="text-orange-600">

{{ $order->status }}

</span>

</p>

<p>

Total :

₹{{ $order->total_price }}

</p>

<p>

Ordered :

{{ $order->created_at->format('d M Y') }}

</p>

</div>

@empty

<h2>

No Orders Yet

</h2>

@endforelse

</div>

@include('components.footer')

</body>

</html>