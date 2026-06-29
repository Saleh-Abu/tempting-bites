<section class="max-w-7xl mx-auto px-6 py-8">

<form action="{{ route('home') }}" method="GET">

<div class="grid md:grid-cols-3 gap-4">

<input
type="text"
name="search"
value="{{ request('search') }}"
placeholder="Search cakes..."
class="border rounded-lg p-3">

<select
name="category"
class="border rounded-lg p-3">

<option value="">All Categories</option>

@foreach($categories as $category)

<option
value="{{ $category->id }}"
{{ request('category')==$category->id ? 'selected':'' }}>

{{ $category->name }}

</option>

@endforeach

</select>

<button
class="bg-orange-500 text-white rounded-lg">

Search

</button>

</div>

</form>

</section>