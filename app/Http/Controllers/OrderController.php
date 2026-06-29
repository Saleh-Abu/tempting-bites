<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail;

class OrderController extends Controller
{
    public function checkout()
    {
        $carts = Cart::with('cake')
            ->where('user_id', Auth::id())
            ->get();

        $total = 0;

        foreach ($carts as $cart) {
            $total += $cart->cake->price * $cart->quantity;
        }

        return view('checkout', compact('carts', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required'
        ]);

        $carts = Cart::with('cake')
            ->where('user_id', Auth::id())
            ->get();

        if ($carts->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Cart is empty.');
        }

        $total = 0;

        foreach ($carts as $cart) {
            $total += $cart->cake->price * $cart->quantity;
        }

        // CASH ON DELIVERY
        if ($request->payment_method == "cod") {

            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $total,
                'status' => 'Pending',
                'payment_method' => 'cod',
                'payment_status' => 'Pending',
            ]);

            foreach ($carts as $cart) {

                OrderItem::create([
                    'order_id' => $order->id,
                    'cake_id' => $cart->cake_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->cake->price,
                ]);

                $cake = $cart->cake;
                $cake->stock -= $cart->quantity;
                $cake->save();
            }
            
           Mail::to($request->email)
    ->send(new OrderConfirmationMail($order));
            Cart::where('user_id', Auth::id())->delete();

            return redirect()
                ->route('orders.success')
                ->with('success', 'Order Placed Successfully!');
        }

        // RAZORPAY

        $api = new Api(
            config('razorpay.key'),
            config('razorpay.secret')
        );

        $razorpayOrder = $api->order->create([
            'receipt' => 'ORDER_' . time(),
            'amount' => $total * 100,
            'currency' => 'INR',
        ]);

       session([
    'checkout_total' => $total,
    'checkout_email' => $request->email,
    'checkout_name' => $request->name,
    'checkout_phone' => $request->phone,
    'checkout_address' => $request->address,
]);

        return view('payments.razorpay', [
            'order' => $razorpayOrder,
            'total' => $total,
            'user' => Auth::user(),
        ]);
    }

    public function paymentSuccess(Request $request)
    {
        $api = new Api(
    config('razorpay.key'),
    config('razorpay.secret')
);

try {

    $api->utility->verifyPaymentSignature([

        'razorpay_order_id' => $request->razorpay_order_id,

        'razorpay_payment_id' => $request->razorpay_payment_id,

        'razorpay_signature' => $request->razorpay_signature,

    ]);

} catch (\Exception $e) {

    return redirect('/checkout')
        ->with('error', 'Payment Verification Failed');

}
        $carts = Cart::with('cake')
            ->where('user_id', Auth::id())
            ->get();

        $total = session('checkout_total');

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total,
            'status' => 'Confirmed',
            'payment_method' => 'razorpay',
            'payment_status' => 'Paid',
            'payment_id' => $request->razorpay_payment_id,
        ]);

        foreach ($carts as $cart) {

            OrderItem::create([
                'order_id' => $order->id,
                'cake_id' => $cart->cake_id,
                'quantity' => $cart->quantity,
                'price' => $cart->cake->price,
            ]);

            $cake = $cart->cake;
            $cake->stock -= $cart->quantity;
            $cake->save();
        }
   

        Cart::where('user_id', Auth::id())->delete();

        session()->forget('checkout_total');
        session()->forget('checkout_email');
session()->forget('checkout_name');
session()->forget('checkout_phone');
session()->forget('checkout_address');
        

        return redirect()
            ->route('orders.success')
            ->with('success', 'Payment Successful!');
    }

    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function adminIndex()
    {
        $orders = Order::with('user')
            ->latest()
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Order Updated Successfully');
    }
}