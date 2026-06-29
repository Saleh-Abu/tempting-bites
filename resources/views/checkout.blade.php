<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Checkout</title>

@vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-orange-50">

@include('components.navbar')

<div class="max-w-7xl mx-auto py-12 px-6">

<h1 class="text-4xl font-bold mb-10">

Checkout

</h1>

<form action="{{ route('orders.store') }}"
method="POST">

@csrf

<div class="grid md:grid-cols-2 gap-10">

<div>

<h2 class="text-2xl font-bold mb-6">

Shipping Information

</h2>

<input
type="text"
name="name"
placeholder="Full Name"
class="w-full border rounded-lg p-3 mb-4">

<input
type="email"
name="email"
placeholder="Email"
class="w-full border rounded-lg p-3 mb-4">

<input
type="text"
name="phone"
placeholder="Phone"
class="w-full border rounded-lg p-3 mb-4">

<textarea
name="address"
rows="5"
placeholder="Delivery Address"
class="w-full border rounded-lg p-3"></textarea>

</div>

<div>

<h2 class="text-2xl font-bold mb-6">

Order Summary

</h2>

@foreach($carts as $cart)

<div class="flex justify-between border-b py-3">

<span>

{{ $cart->cake->name }}

x{{ $cart->quantity }}

</span>

<span>

₹{{ $cart->cake->price * $cart->quantity }}

</span>

</div>

@endforeach

<h2 class="text-3xl font-bold mt-8">

Total ₹{{ $total }}

<h2 class="text-3xl font-bold mt-8">
    Total ₹{{ $total }}
</h2>

<div class="mt-8">

    <h3 class="text-xl font-semibold mb-4">
        Payment Method
    </h3>

    <label class="flex items-center mb-3 cursor-pointer">
        <input
            type="radio"
            name="payment_method"
            value="cod"
            checked
            class="mr-3">

        Cash on Delivery
    </label>

    <label class="flex items-center cursor-pointer">
        <input
            type="radio"
            name="payment_method"
            value="razorpay"
            class="mr-3">

        Pay Online (Razorpay)
    </label>

</div>

<button
    type="submit"
    id="placeOrderBtn"
    class="bg-orange-500 text-white px-8 py-4 rounded-xl mt-8 w-full hover:bg-orange-600">

    Place Order

</button>

</button>

</div>

</div>

</form>

</div>

@include('components.footer')<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>

const radios = document.querySelectorAll('input[name="payment_method"]');
const button = document.getElementById('placeOrderBtn');

radios.forEach(radio => {

    radio.addEventListener('change', function(){

        if(this.value === 'razorpay'){
            button.innerText = 'Pay with Razorpay';
        }else{
            button.innerText = 'Place Order';
        }

    });

});

</script>

</body>

</html>