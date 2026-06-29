@extends('layouts.admin')

@section('content')

<h1 class="text-4xl font-bold mb-8">
    Edit Cake
</h1>

<div class="bg-white rounded-xl shadow p-8">

<form action="{{ route('cakes.update',$cake->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <!-- Cake Name -->
    <div class="mb-5">
        <label class="font-semibold">Cake Name</label>
        <input
            type="text"
            name="name"
            value="{{ $cake->name }}"
            class="w-full border rounded-lg p-3 mt-2">
    </div>

    <!-- Category -->
    <div class="mb-5">
        <label class="font-semibold">Category</label>

        <select
            name="category_id"
            class="w-full border rounded-lg p-3 mt-2">

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    {{ $cake->category_id == $category->id ? 'selected' : '' }}>

                    {{ $category->name }}

                </option>

            @endforeach

        </select>
    </div>

    <!-- Price -->
    <div class="grid grid-cols-2 gap-6">

        <div>

            <label class="font-semibold">
                Price
            </label>

            <input
                type="number"
                name="price"
                value="{{ $cake->price }}"
                class="w-full border rounded-lg p-3 mt-2">

        </div>

        <div>

            <label class="font-semibold">
                Discount Price
            </label>

            <input
                type="number"
                name="discount_price"
                value="{{ $cake->discount_price }}"
                class="w-full border rounded-lg p-3 mt-2">

        </div>

    </div>

    <!-- Flavour -->
    <div class="grid grid-cols-2 gap-6 mt-5">

        <div>

            <label class="font-semibold">
                Flavour
            </label>

            <input
                type="text"
                name="flavour"
                value="{{ $cake->flavour }}"
                class="w-full border rounded-lg p-3 mt-2">

        </div>

        <div>

            <label class="font-semibold">
                Weight
            </label>

            <input
                type="text"
                name="weight"
                value="{{ $cake->weight }}"
                class="w-full border rounded-lg p-3 mt-2">

        </div>

    </div>

    <!-- Egg Type -->
    <div class="grid grid-cols-2 gap-6 mt-5">

        <div>

            <label class="font-semibold">
                Egg Type
            </label>

            <select
                name="egg_type"
                class="w-full border rounded-lg p-3 mt-2">

                <option
                    value="Egg"
                    {{ $cake->egg_type=='Egg' ? 'selected' : '' }}>

                    Egg

                </option>

                <option
                    value="Eggless"
                    {{ $cake->egg_type=='Eggless' ? 'selected' : '' }}>

                    Eggless

                </option>

            </select>

        </div>

        <div>

            <label class="font-semibold">
                Stock
            </label>

            <input
                type="number"
                name="stock"
                value="{{ $cake->stock }}"
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
            class="w-full border rounded-lg p-3 mt-2">{{ $cake->description }}</textarea>

    </div>

    <!-- Current Image -->

    <div class="mt-5">

        <label class="font-semibold">

            Current Image

        </label>

        <br><br>

        <img
            src="{{ asset('uploads/cakes/'.$cake->image) }}"
            width="120"
            class="rounded">

    </div>

    <!-- New Image -->

    <div class="mt-5">

        <label class="font-semibold">

            Change Image

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
                value="1"
                {{ $cake->is_featured ? 'checked' : '' }}>

            Featured Cake

        </label>

    </div>

    <button
        class="mt-8 bg-orange-500 text-white px-8 py-3 rounded-lg">

        Update Cake

    </button>

</form>

</div>

@endsection