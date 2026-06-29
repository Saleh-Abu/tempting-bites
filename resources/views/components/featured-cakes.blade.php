<section class="max-w-7xl mx-auto py-16 px-6">

    <div class="flex justify-between items-center mb-10">
        <h2 class="text-4xl font-bold text-gray-800">
            Featured Cakes
        </h2>

        <a href="#" class="text-orange-500 font-semibold hover:underline">
            View All →
        </a>
    </div>

    <div class="grid md:grid-cols-3 gap-8">

        <!-- Cake 1 -->
       
@foreach($cakes as $cake)

<div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">

    <div class="relative">

        <img
            src="{{ asset('uploads/cakes/'.$cake->image) }}"
            class="w-full h-64 object-cover"
            alt="{{ $cake->name }}">

        @if($cake->is_featured)

        <span class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm">
            Featured
        </span>

        @endif

        <button class="absolute top-4 right-4 bg-white w-10 h-10 rounded-full shadow hover:bg-orange-100">
            ❤️
        </button>

    </div>

    <div class="p-6">

        <div class="flex justify-between items-center">

            <h3 class="text-2xl font-bold">
                {{ $cake->name }}
            </h3>

            <span class="text-yellow-500 font-semibold">
                ⭐ 4.8
            </span>

        </div>

        <p class="text-gray-500 mt-3">

            {{ $cake->description }}

        </p>

        <div class="flex justify-between items-center mt-6">

            <span class="text-2xl font-bold text-orange-600">

                ₹{{ $cake->price }}

            </span>

           <a href="{{ route('cakes.show',$cake->id) }}"
           class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-xl">

           View Details

             </a>
        </div>

    </div>

</div>

@endforeach

                </div>

            </div>

        </div>

    </div>

</section>