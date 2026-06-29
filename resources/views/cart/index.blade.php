<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-orange-50">

@include('components.navbar')

<div class="max-w-7xl mx-auto py-10 px-6">

    <h1 class="text-4xl font-bold mb-8">
        My Cart
    </h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @php
        $total = 0;
    @endphp

    @forelse($carts as $cart)

        @php
            $subtotal = $cart->cake->price * $cart->quantity;
            $total += $subtotal;
        @endphp

        <div class="bg-white shadow rounded-xl p-6 mb-6 flex justify-between items-center">

            <div class="flex items-center gap-5">

                <img src="{{ asset('uploads/cakes/'.$cart->cake->image) }}"
                     class="w-24 h-24 rounded-lg object-cover">

                <div>

                    <h2 class="text-2xl font-bold">
                        {{ $cart->cake->name }}
                    </h2>

                    <p class="text-orange-600 font-bold">
                        ₹{{ $cart->cake->price }}
                    </p>

                    <p>
                        Quantity : {{ $cart->quantity }}
                    </p>

                    <p class="font-semibold mt-2">
                        Subtotal : ₹{{ $subtotal }}
                    </p>

                </div>

            </div>

            <form action="{{ route('cart.remove',$cart->id) }}" method="POST">

                @csrf
                @method('DELETE')

                <button class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-lg">
                    Remove
                </button>

            </form>

        </div>

    @empty

        <h2 class="text-center text-2xl">
            Your Cart is Empty 🛒
        </h2>

    @endforelse

    @if($carts->count())

        <div class="bg-white shadow-xl rounded-xl p-8 mt-10">

            <div class="flex justify-between text-2xl font-bold">

                <span>Total</span>

                <span>₹{{ $total }}</span>

            </div>

            <div class="mt-8 flex gap-4">

                <a href="{{ route('home') }}"
                   class="flex-1 bg-gray-500 hover:bg-gray-600 text-white text-center py-4 rounded-xl">

                    Continue Shopping

                </a>

                <a href="{{ route('checkout') }}"
                   class="flex-1 bg-orange-500 hover:bg-orange-600 text-white text-center py-4 rounded-xl">

                    Proceed to Checkout

                </a>

            </div>

        </div>

    @endif

</div>

@include('components.footer')

</body>
</html>