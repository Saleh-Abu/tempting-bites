<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body style="font-family:Arial">

<h2>🎂 Thank You for Your Order!</h2>

<p>Hello,</p>

<p>Your order has been placed successfully.</p>

<hr>

<h3>Order Details</h3>

<p><strong>Order ID:</strong> {{ $order->id }}</p>

<p><strong>Total:</strong> ₹{{ $order->total_price }}</p>

<p><strong>Payment:</strong> {{ ucfirst($order->payment_method) }}</p>

<p><strong>Status:</strong> {{ $order->payment_status }}</p>

<hr>

<p>
Thank you for choosing <strong>Tempting Bites</strong>.
We hope to serve you again soon! ❤️
</p>

</body>

</html>