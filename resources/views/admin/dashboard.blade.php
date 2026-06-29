@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">

    <h1 class="text-4xl font-bold mb-10">
        📊 Admin Dashboard
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-gray-500">Total Revenue</h2>
            <p class="text-3xl font-bold text-green-600">
                ₹{{ number_format($totalRevenue,2) }}
            </p>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-gray-500">Total Orders</h2>
            <p class="text-3xl font-bold">
                {{ $totalOrders }}
            </p>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-gray-500">Customers</h2>
            <p class="text-3xl font-bold">
                {{ $totalCustomers }}
            </p>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-gray-500">Total Cakes</h2>
            <p class="text-3xl font-bold">
                {{ $totalCakes }}
            </p>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-gray-500">Pending Orders</h2>
            <p class="text-3xl font-bold text-yellow-500">
                {{ $pendingOrders }}
            </p>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-gray-500">Delivered Orders</h2>
            <p class="text-3xl font-bold text-blue-600">
                {{ $deliveredOrders }}
            </p>
        </div>

    </div>

    <div class="bg-white shadow-lg rounded-xl p-8 mt-10">

        <h2 class="text-2xl font-bold mb-6">
            Recent Orders
        </h2>

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-3">Order ID</th>
                    <th class="text-left">Customer</th>
                    <th class="text-left">Total</th>
                    <th class="text-left">Status</th>

                </tr>

            </thead>

            <tbody>

                @foreach($recentOrders as $order)

                <tr class="border-b">

                    <td class="py-4">
                        #{{ $order->id }}
                    </td>

                    <td>
                        {{ $order->user->name }}
                    </td>

                    <td>
                        ₹{{ $order->total_price }}
                    </td>

                    <td>

                        <span class="px-3 py-1 rounded-full bg-orange-100 text-orange-700">

                            {{ $order->status }}

                        </span>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection