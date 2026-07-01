<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Cake::query();

        // Search by cake name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $cakes = $query->latest()->get();

        $categories = Category::all();

        return view('welcome', compact('cakes', 'categories'));
    }
    public function cakes(Request $request)
{
    $query = \App\Models\Cake::query();

    // Search
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Category Filter
    if ($request->filled('category')) {
        $query->where('category_id', $request->category);
    }

    // Price Sorting
    if ($request->sort == 'low_high') {
        $query->orderBy('price');
    }

    if ($request->sort == 'high_low') {
        $query->orderByDesc('price');
    }

    $cakes = $query->paginate(9);

    $categories = \App\Models\Category::all();

    return view('cakes.index', compact('cakes', 'categories')); // this is used for cake.index page
}
public function categories()
{
    $categories = \App\Models\Category::withCount('cakes')->get();

    return view('categories.index', compact('categories'));
}
}
