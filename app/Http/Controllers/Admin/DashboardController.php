<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cake;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
{
    $totalCakes = Cake::count();

    $totalCategories = Category::count();

    $totalOrders = Order::count();

$totalCustomers = User::where('is_admin', 0)->count();

    $totalRevenue = Order::where('payment_status', 'Paid')
        ->sum('total_price');

    $pendingOrders = Order::where('status', 'Pending')->count();

    $deliveredOrders = Order::where('status', 'Delivered')->count();

    $recentOrders = Order::with('user')
        ->latest()
        ->take(5)
        ->get();

   return view('admin.dashboard', compact(
    'totalCakes',
    'totalCategories',
    'totalOrders',
    'totalCustomers',
    'totalRevenue',
    'pendingOrders',
    'deliveredOrders',
    'recentOrders'
));
}
}