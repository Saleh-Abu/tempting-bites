@extends('layouts.admin')

@section('content')

@if(session('success'))
<div class="bg-green-100 text-green-700 p-4 rounded mb-5">
    {{ session('success') }}
</div>
@endif

<div class="flex justify-between mb-8">

<h1 class="text-3xl font-bold">

Manage Cakes

</h1>

<a href="{{ route('cakes.create') }}"
class="bg-orange-500 text-white px-5 py-3 rounded">

+ Add Cake

</a>

</div>

<table class="w-full bg-white shadow rounded">

<thead class="bg-gray-100">

<tr>

<th class="p-3">Image</th>
<th>Name</th>
<th>Category</th>
<th>Price</th>
<th>Stock</th>
<th>Featured</th>
<th>Action</th>

</tr>

</thead>

<tbody>

@foreach($cakes as $cake)

<tr class="border-b text-center">

<td class="p-3">

<img src="{{ asset('uploads/cakes/'.$cake->image) }}"
width="70">

</td>

<td>{{ $cake->name }}</td>

<td>{{ $cake->category->name }}</td>

<td>₹{{ $cake->price }}</td>

<td>{{ $cake->stock }}</td>

<td>

@if($cake->is_featured)

⭐

@else

—

@endif

</td>

<td>

<a href="{{ route('cakes.edit',$cake->id) }}"
class="bg-blue-500 text-white px-3 py-2 rounded">

Edit

</a>

<form
action="{{ route('cakes.destroy',$cake->id) }}"
method="POST"
class="inline">

@csrf

@method('DELETE')

<button
onclick="return confirm('Delete Cake?')"
class="bg-red-500 text-white px-3 py-2 rounded">

Delete

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

@endsection