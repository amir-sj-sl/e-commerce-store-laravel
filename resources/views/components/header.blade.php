<header class="sticky top-0 z-50 bg-white shadow-md">

    {{-- Top Black Label --}}
    <div class="bg-black text-white text-center font-thin py-1 text-sm">
        Sign up and get <span class="font-semibold">20% off</span> your first order. 
        <a href="#" class="underline font-normal">Sign up now</a>
    </div>

    {{-- Main Header --}}
    <div class="flex items-center justify-between px-6 md:px-20 py-4">

        {{-- Logo --}}
        <a href="{{ route('index') }}" class="flex items-center">
            <span class="font-black text-3xl text-gray-900">SHOP.CO</span>
        </a>

        {{-- Navigation --}}
        <nav class="hidden md:flex gap-6 text-gray-700 font-medium">
            <a href="{{ route('product.index') }}" class="hover:text-black transition">Shop</a>
            <a href="/" class="hover:text-black transition">On Sales</a>
            <a href="/" class="hover:text-black transition">New Arrivals</a>
            <a href="{{ route('category.index') }}" class="hover:text-black transition">Brands</a>
        </nav>

        {{-- Search Bar --}}
        <form action="{{ route('products.search') }}" method="GET" class="relative w-1/3 hidden md:flex">
            <input type="text" name="q" value="{{ $query ?? '' }}" placeholder="Search products..." 
                class="w-full rounded-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent transition"/>
            <button type="submit" class="absolute right-1 top-1/2 transform -translate-y-1/2 bg-black text-white px-4 py-1.5 rounded-full hover:bg-gray-800 transition">Search</button>
        </form>

        {{-- Auth & Cart --}}
        <div class="flex items-center gap-4">
            @guest
                <a href="{{ route('login') }}" class="text-gray-700 font-medium hover:text-black transition flex items-center gap-1">
                    <i class="fa-solid fa-right-to-bracket"></i> Login
                </a>
            @endguest

            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-gray-700 font-medium hover:text-black transition">Logout</button>
                </form>

                <a href="{{ route('cart') }}" class="relative text-gray-700 hover:text-black transition">
                    <i class="fa-solid fa-cart-shopping text-xl">Cart</i>
                    @if(session('cart') && count(session('cart')) > 0)
                        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                            {{ count(session('cart')) }}
                        </span>
                    @endif
                </a>
            @endauth
        </div>
    </div>

    {{-- Mobile Navigation & Search --}}
    <div class="md:hidden px-6 pb-4 flex flex-col gap-3">
        <form action="{{ route('products.search') }}" method="GET" class="flex">
            <input type="text" name="q" value="{{ $query ?? '' }}" placeholder="Search products..." 
                class="w-full rounded-l-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-black transition"/>
            <button type="submit" class="bg-black text-white px-4 rounded-r-full hover:bg-gray-800 transition">Search</button>
        </form>

        <nav class="flex flex-col gap-2">
            <a href="/" class="text-gray-700 hover:text-black transition">Shop</a>
            <a href="/" class="text-gray-700 hover:text-black transition">On Sales</a>
            <a href="/" class="text-gray-700 hover:text-black transition">New Arrivals</a>
            <a href="/" class="text-gray-700 hover:text-black transition">Brands</a>
        </nav>
    </div>

</header>