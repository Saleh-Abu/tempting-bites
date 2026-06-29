<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Order Success</title>

@vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-orange-50">

@include('components.navbar')

<div class="max-w-3xl mx-auto text-center py-24">

<h1 class="text-6xl">

🎉

</h1>

<h2 class="text-4xl font-bold mt-8">

Order Placed Successfully

</h2>

<p class="text-gray-500 mt-6">

Thank you for ordering from Tempting Bites.

</p>

<a href="/"

class="bg-orange-500 text-white px-8 py-3 rounded-xl inline-block mt-10">

Continue Shopping

</a>

</div>

@include('components.footer')

</body>

</html>