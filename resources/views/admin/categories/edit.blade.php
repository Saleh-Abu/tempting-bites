@extends('layouts.admin')

@section('content')

<h1 class="text-4xl font-bold mb-8">
    Edit Category
</h1>

<div class="bg-white p-8 rounded-xl shadow">

<form action="{{ route('categories.update',$category->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-5">

        <label class="font-semibold">
            Category Name
        </label>

        <input
            type="text"
            name="name"
            value="{{ $category->name }}"
            class="w-full border rounded-lg p-3 mt-2">

    </div>

    <div class="mb-5">

        <label class="font-semibold">
            Slug
        </label>

        <input
            type="text"
            name="slug"
            value="{{ $category->slug }}"
            class="w-full border rounded-lg p-3 mt-2">

    </div>

    <div class="mb-5">

        <label class="font-semibold">
            Description
        </label>

        <textarea
            name="description"
            class="w-full border rounded-lg p-3 mt-2"
            rows="5">{{ $category->description }}</textarea>

    </div>

    <button
        class="bg-orange-500 text-white px-6 py-3 rounded-lg">

        Update Category

    </button>

</form>

</div>

@endsection