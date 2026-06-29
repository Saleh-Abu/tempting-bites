@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-8">

    <h1 class="text-4xl font-bold">
        Manage Categories
    </h1>

    <a href="{{ route('categories.create') }}"
       class="bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600">

        + Add Category

    </a>

</div>

<div class="bg-white rounded-xl shadow p-6">

    <table class="w-full">

        <thead>

        <tr class="border-b">

            <th class="text-left py-3">ID</th>
            <th class="text-left py-3">Category</th>
            <th class="text-left py-3">Slug</th>
            <th class="text-left py-3">Action</th>

        </tr>

        </thead>

        <tbody>

        @foreach($categories as $category)

            <tr class="border-b">

                <td class="py-4">{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>

                <td>
                <a href="{{ route('categories.edit', $category->id) }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded inline-block">
                          Edit
                 </a>
         <form action="{{ route('categories.destroy', $category->id) }}"
      method="POST"
      class="inline">

                      @csrf
                    @method('DELETE')

                       <button
                      onclick="return confirm('Are you sure you want to delete this category?')"
                             class="bg-red-500 text-white px-4 py-2 rounded">

                 Delete

               </button>

                    </form>
                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection