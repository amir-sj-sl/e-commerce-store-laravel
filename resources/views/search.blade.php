<x-layout>
    <section class="max-w-7xl mx-auto px-6 md:px-20 mt-10">

        {{-- Search Form --}}
        <header class="mb-8">
            <form action="{{ route('products.search') }}" method="GET" class="flex w-full max-w-xl mx-auto">
                <input type="text" name="q" value="{{ $query ?? '' }}" 
                    placeholder="Search products..."
                    class="flex-1 rounded-l-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent"/>
                <button type="submit" 
                        class="bg-black text-white rounded-r-full px-6 py-2 font-medium hover:bg-gray-800 transition">
                    Search
                </button>
            </form>
        </header>

        {{-- Products Grid --}}
        @if (isset($products) && $products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <article class="bg-white rounded-xl shadow-md overflow-hidden transform hover:scale-105 transition duration-300">
                        <a href="{{ route('product.show', $product) }}">
                            @if($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                            @endif
                            <div class="p-4">
                                <h2 class="font-semibold text-gray-800">{{ $product->name }}</h2>
                                @if(isset($product->price))
                                    <p class="text-gray-600 mt-1">${{ $product->price }}</p>
                                @endif
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500 text-lg mt-8">Nothing Found</p>
        @endif

        {{-- Pagination --}}
        @if(isset($products))
            <nav class="mt-8 flex justify-center">
                {{ $products->links('pagination::tailwind') }}
            </nav>
        @endif

    </section>
</x-layout>

