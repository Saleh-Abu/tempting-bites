<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <title>Pay with Razorpay</title>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

</head>

<body>

<h2>Please wait...</h2>

<form id="payment-success" action="{{ route('payment.success') }}" method="POST">

    @csrf

    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">

    <input type="hidden" name="razorpay_order_id" value="{{ $order['id'] }}">

    <input type="hidden" name="amount" value="{{ $total }}">
    <input type="hidden"
       name="razorpay_signature"
       id="razorpay_signature">

</form>

<script>

var options = {

    "key":"{{ config('razorpay.key') }}",

    "amount":"{{ $order['amount'] }}",

    "currency":"INR",

    "name":"Tempting Bites",

    "description":"Cake Order Payment",

    "order_id":"{{ $order['id'] }}",

   handler:function(response){

    document.getElementById('razorpay_payment_id').value =
        response.razorpay_payment_id;

    document.getElementById('razorpay_signature').value =
        response.razorpay_signature;

    document.getElementById('payment-success').submit();

},

    "prefill":{

        "name":"{{ $user->name }}",

        "email":"{{ $user->email }}"

    },

    "theme":{

        "color":"#f97316"

    }

};

var rzp = new Razorpay(options);

rzp.open();

rzp.on('payment.failed', function () {

    alert("Payment Failed");

    window.location="/checkout";

});


</script>

</body>

</html>