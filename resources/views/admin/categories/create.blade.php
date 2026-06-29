<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="max-w-3xl mx-auto py-10">

    <div class="bg-white rounded-xl shadow-lg p-8">

        <h1 class="text-3xl font-bold mb-8">
            Add New Category
        </h1>

        <form action="{{ route('categories.store') }}" method="POST">

            @csrf

            <div class="mb-5">

                <label class="block mb-2 font-semibold">
                    Category Name
                </label>

                <input
                    type="text"
                    name="name"
                    class="w-full border rounded-lg p-3">

            </div>

            <div class="mb-5">

                <label class="block mb-2 font-semibold">
                    Slug
                </label>

                <input
                    type="text"
                    name="slug"
                    class="w-full border rounded-lg p-3">

            </div>

            <div class="mb-5">

                <label class="block mb-2 font-semibold">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="w-full border rounded-lg p-3"></textarea>

            </div>

            <button
                class="bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600">

                Save Category

            </button>

        </form>

    </div>

</div>

</body>
</html>