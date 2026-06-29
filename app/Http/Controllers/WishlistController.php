<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Cake;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with('cake')
            ->where('user_id', Auth::id())
            ->get();

        return view('wishlist.index', compact('wishlists'));
    }

    public function add(Cake $cake)
    {
        Wishlist::firstOrCreate([
            'user_id' => Auth::id(),
            'cake_id' => $cake->id,
        ]);

        return back()->with('success','Added to Wishlist');
    }

    public function remove(Wishlist $wishlist)
    {
        $wishlist->delete();

        return back()->with('success','Removed from Wishlist');
    }
}