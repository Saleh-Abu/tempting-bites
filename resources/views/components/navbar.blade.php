<nav class="bg-white shadow-md sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <a href="{{ route('home') }}"
               class="text-2xl md:text-3xl font-extrabold text-orange-500 whitespace-nowrap">

                🎂 Tempting Bites

            </a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8 font-medium text-gray-700">

                <a href="{{ route('home') }}"
                   class="hover:text-orange-500 transition">
                    Home
                </a>

                <a href="{{ route('cakes.index') }}"
                   class="hover:text-orange-500 transition">
                    Cakes
                </a>

                <a href="{{ route('categories.list') }}"
                   class="hover:text-orange-500 transition">
                    Categories
                </a>

                @auth
                <a href="{{ route('orders.index') }}"
                   class="hover:text-orange-500 transition">
                    My Orders
                </a>
                @endauth

            </div>

            <!-- Desktop Right Side -->
            <div class="hidden lg:flex items-center gap-4">

                <!-- Search -->
                <form action="{{ route('cakes.index') }}" method="GET">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search cakes..."
                        class="border rounded-lg px-4 py-2 w-52 focus:outline-none focus:ring-2 focus:ring-orange-400">

                </form>

                <!-- Wishlist -->
                @auth
                <a href="{{ route('wishlist.index') }}"
                   class="text-2xl hover:scale-110 transition duration-300">

                    ❤️

                </a>
                @endauth

                <!-- Cart -->
                @auth
                <a href="{{ route('cart.index') }}"
                   class="relative text-2xl hover:scale-110 transition duration-300">

                    🛒

                </a>
                @endauth

                @guest

                    <a href="{{ route('login') }}"
                       class="px-4 py-2 border border-orange-500 rounded-lg text-orange-500 hover:bg-orange-50">

                        Login

                    </a>

                    <a href="{{ route('register') }}"
                       class="px-5 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600">

                        Register

                    </a>

                @else

                    <a href="{{ route('dashboard') }}"
                       class="px-5 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600">

                        Dashboard

                    </a>

                @endguest

            </div>

            <!-- Mobile Menu Button -->
            <button
                id="menu-btn"
                class="lg:hidden text-3xl text-orange-500 focus:outline-none">

                ☰

            </button>

        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden pb-6">

            <div class="flex flex-col space-y-4 font-medium text-gray-700">

                <a href="{{ route('home') }}"
                   class="hover:text-orange-500">

                    Home

                </a>

                <a href="{{ route('cakes.index') }}"
                   class="hover:text-orange-500">

                    Cakes

                </a>

                <a href="{{ route('categories.list') }}"
                   class="hover:text-orange-500">

                    Categories

                </a>

                @auth

                <a href="{{ route('orders.index') }}"
                   class="hover:text-orange-500">

                    My Orders

                </a>

                @endauth

                <!-- Mobile Search -->

                <form
                    action="{{ route('cakes.index') }}"
                    method="GET">

                    <input
                        type="text"
                        name="search"
                        placeholder="Search cakes..."
                        value="{{ request('search') }}"
                        class="w-full border rounded-lg px-4 py-2">

                </form>
                                @auth

                    <div class="flex items-center gap-6 mt-2">

                        <a href="{{ route('wishlist.index') }}"
                           class="text-2xl">
                            ❤️ Wishlist
                        </a>

                        <a href="{{ route('cart.index') }}"
                           class="text-2xl">
                            🛒 Cart
                        </a>

                    </div>

                    <a href="{{ route('dashboard') }}"
                       class="bg-orange-500 text-white text-center rounded-lg py-3 mt-4 hover:bg-orange-600">

                        Dashboard

                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="border border-orange-500 text-orange-500 text-center rounded-lg py-3 mt-4 hover:bg-orange-50">

                        Login

                    </a>

                    <a href="{{ route('register') }}"
                       class="bg-orange-500 text-white text-center rounded-lg py-3 hover:bg-orange-600">

                        Register

                    </a>

                @endauth

            </div>

        </div>

    </div>

</nav>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', function () {

        mobileMenu.classList.toggle('hidden');

        if(menuBtn.innerHTML === '☰'){
            menuBtn.innerHTML = '✖';
        }else{
            menuBtn.innerHTML = '☰';
        }

    });

});

</script>