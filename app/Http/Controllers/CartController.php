<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('cake')
            ->where('user_id', Auth::id())
            ->get();

        return view('cart.index', compact('carts'));
    }

    public function add(Cake $cake)
    {
        $cart = Cart::where('user_id', Auth::id())
                    ->where('cake_id', $cake->id)
                    ->first();

        if ($cart) {
            $cart->increment('quantity');
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'cake_id' => $cake->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Cake added to cart!');
    }

    public function remove(Cart $cart)
    {
        $cart->delete();

        return redirect()->back()->with('success', 'Cake removed from cart!');
    }
}