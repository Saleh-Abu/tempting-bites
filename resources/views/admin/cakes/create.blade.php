@extends('layouts.admin')

@section('content')

<h1 class="text-4xl font-bold mb-8">
    Add New Cake
</h1>

<div class="bg-white rounded-xl shadow p-8">

<form action="{{ route('cakes.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <!-- Cake Name -->
    <div class="mb-5">
        <label class="font-semibold">Cake Name</label>
        <input type="text"
               name="name"
               class="w-full border rounded-lg p-3 mt-2">
    </div>

    <!-- Category -->
    <div class="mb-5">
        <label class="font-semibold">Category</label>

        <select name="category_id"
                class="w-full border rounded-lg p-3 mt-2">

            <option value="">Select Category</option>

            @foreach($categories as $category)

                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>

            @endforeach

        </select>
    </div>

    <!-- Price -->
    <div class="grid grid-cols-2 gap-6">

        <div>
            <label class="font-semibold">Price</label>

            <input type="number"
                   name="price"
                   class="w-full border rounded-lg p-3 mt-2">
        </div>

        <div>
            <label class="font-semibold">Discount Price</label>

            <input type="number"
                   name="discount_price"
                   class="w-full border rounded-lg p-3 mt-2">
        </div>

    </div>

    <!-- Flavour & Weight -->
    <div class="grid grid-cols-2 gap-6 mt-5">

        <div>

            <label class="font-semibold">Flavour</label>

            <input type="text"
                   name="flavour"
                   class="w-full border rounded-lg p-3 mt-2">

        </div>

        <div>

            <label class="font-semibold">Weight</label>

            <input type="text"
                   name="weight"
                   placeholder="1 Kg"
                   class="w-full border rounded-lg p-3 mt-2">

        </div>

    </div>

    <!-- Egg Type & Stock -->
    <div class="grid grid-cols-2 gap-6 mt-5">

        <div>

            <label class="font-semibold">Egg Type</label>

            <select name="egg_type"
                    class="w-full border rounded-lg p-3 mt-2">

                <option>Egg</option>
                <option>Eggless</option>

            </select>

        </div>

        <div>

            <label class="font-semibold">Stock</label>

            <input type="number"
                   name="stock"
                   class="w-full border rounded-lg p-3 mt-2">

        </div>

    </div>

    <!-- Description -->
    <div class="mt-5">

        <label class="font-semibold">
            Description
        </label>

        <textarea
            name="description"
            rows="5"
            class="w-full border rounded-lg p-3 mt-2"></textarea>

    </div>

    <!-- Image -->
    <div class="mt-5">

        <label class="font-semibold">
            Cake Image
        </label>

        <input
            type="file"
            name="image"
            class="w-full border rounded-lg p-3 mt-2">

    </div>

    <!-- Featured -->
    <div class="mt-5">

        <label>

            <input
                type="checkbox"
                name="is_featured"
                value="1">

            Featured Cake

        </label>

    </div>

    <button
        class="mt-8 bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-lg">

        Save Cake

    </button>
    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</form>

</div>

@endsection