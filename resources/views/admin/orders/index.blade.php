@extends('layouts.admin')

@section('content')

<h1 class="text-4xl font-bold mb-8">

All Orders

</h1>

@foreach($orders as $order)

<div class="bg-white shadow rounded-xl p-6 mb-6">

<h2 class="text-2xl font-bold">

Order #{{ $order->id }}

</h2>

<p>

Customer :

{{ $order->user->name }}

</p>

<p>

Total :

₹{{ $order->total_price }}

</p>

<form
action="{{ route('admin.orders.update',$order->id) }}"
method="POST"
class="mt-5">

@csrf
@method('PUT')

<select
name="status"
class="border rounded-lg p-2">

<option
{{ $order->status=='Pending'?'selected':'' }}>

Pending

</option>

<option
{{ $order->status=='Preparing'?'selected':'' }}>

Preparing

</option>

<option
{{ $order->status=='Delivered'?'selected':'' }}>

Delivered

</option>

<option
{{ $order->status=='Cancelled'?'selected':'' }}>

Cancelled

</option>

</select>

<button
class="bg-orange-500 text-white px-4 py-2 rounded ml-3">

Update

</button>

</form>

</div>

@endforeach

@endsection