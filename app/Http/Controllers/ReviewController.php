<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Cake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Cake $cake)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1000',
        ]);

        Review::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'cake_id' => $cake->id,
            ],
            [
                'rating' => $request->rating,
                'review' => $request->review,
            ]
        );

        return back()->with('success', 'Review submitted successfully!');
    }

    public function destroy(Review $review)
    {
        if ($review->user_id != Auth::id() && !Auth::user()->is_admin) {
            abort(403);
        }

        $review->delete();

        return back()->with('success', 'Review deleted successfully!');
    }

    public function adminIndex()
    {
        $reviews = Review::with(['user', 'cake'])
            ->latest()
            ->paginate(10);

        return view('admin.reviews.index', compact('reviews'));
    }
}
