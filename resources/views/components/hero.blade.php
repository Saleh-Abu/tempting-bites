<section class="max-w-7xl mx-auto px-6 py-8">

    <div class="grid lg:grid-cols-4 gap-6">

        <!-- Hero -->
        <div class="lg:col-span-3 bg-orange-50 rounded-3xl p-10 shadow">

            <div class="grid md:grid-cols-2 gap-8 items-center">

                <!-- Left -->
                <div>

                    <p class="text-orange-500 font-semibold mb-3">
                        ❤ Made with Love
                    </p>

                    <h1 class="text-5xl font-bold text-gray-800 leading-tight">
                        Celebrate Every
                        <br>
                        Moment with
                        <span class="text-orange-500">
                            Cake
                        </span>
                    </h1>

                    <p class="text-gray-600 mt-6 text-lg">
                        Delicious cakes for every occasion,
                        baked fresh with the finest ingredients.
                    </p>

                    <div class="mt-8 flex gap-4">

                        <button
                            class="bg-orange-500 hover:bg-orange-600 text-white px-7 py-3 rounded-xl font-semibold">

                            Shop Cakes

                        </button>

                        <button
                            class="border border-gray-300 hover:bg-gray-100 px-7 py-3 rounded-xl">

                            Explore Categories

                        </button>

                    </div>

                </div>

                <!-- Right Image -->

                <div>

                    <img
    id="heroImage"
    src="{{ asset('images/hero1.jpg') }}"
    alt="Tempting Bites Hero"
    class="rounded-3xl shadow-xl w-full h-[450px] object-cover
           transition-all duration-700 ease-in-out">
                </div>

            </div>

        </div>

        <!-- AI Sidebar -->

        <div class="bg-white rounded-3xl shadow p-6">

            <h2 class="text-2xl font-bold mb-6">

                ✨ Tempting Bites AI

            </h2>

            <p class="text-gray-600 mb-6">

                How can I help you today?

            </p>

            <div class="space-y-3">

                <a href="{{ route('ai.index', ['question' => 'featured cake']) }}"
   class="block border rounded-xl p-4 text-center hover:bg-orange-50">

    🎂 Recommend a Cake

</a>
<a href="{{ route('ai.index', ['question' => 'birthday cake']) }}"
   class="block border rounded-xl p-4 text-center hover:bg-orange-50">

    🎉 Birthday Cake

</a>

                <a href="{{ route('ai.index', ['question' => 'cake under 500']) }}"
   class="block border rounded-xl p-4 text-center hover:bg-orange-50">

    💰 Budget Friendly

</a>

               <a href="{{ route('ai.index', ['question' => 'featured cake']) }}"
   class="block border rounded-xl p-4 text-center hover:bg-orange-50">

    🚚 Same Day Delivery

</a>
            </div>

            <div class="mt-8">

                <input
                    type="text"
                    placeholder="Ask me anything..."
                    class="w-full border rounded-xl p-3">

            </div>

        </div>

    </div>

</section>