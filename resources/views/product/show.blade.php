<x-layout>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 py-12 grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">

        {{-- Product Image --}}
        <article class="rounded-xl overflow-hidden shadow-lg">
            <img src="{{ $product->image }}" alt="{{ $product->name }}" 
                 class="w-full h-64 sm:h-80 md:h-full object-cover rounded-xl">
        </article>

        {{-- Product Details --}}
        <article class="flex flex-col gap-4 md:gap-6">

            {{-- Product Title --}}
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900">
                {{ $product->name }}
            </h1>

            {{-- Category Badge --}}
            <a href="{{ route('category.show', $product->category_id) }}" class="inline-block">
                <p class="inline-block bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">
                    {{ $product->category->name }}
                </p>
            </a>

            {{-- Price --}}
            <div class="text-xl sm:text-2xl md:text-3xl font-semibold text-green-600 mt-2">
                ${{ number_format($product->price, 2) }}
            </div>

            {{-- Description --}}
            <p class="text-gray-700 text-sm sm:text-base md:text-lg leading-relaxed mt-2">
                {{ $product->description }}
            </p>

            {{-- Actions --}}
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mt-4">
                {{-- Add to Cart --}}
                <form action="{{ route('cart.add') }}" method="POST" class="flex-1">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button class="w-full bg-black text-white px-4 sm:px-6 py-3 rounded-full font-medium hover:bg-gray-800 transition transform hover:scale-105">
                        Add to Cart
                    </button>
                </form>

                {{-- Wishlist Button (optional) --}}
                {{-- 
                <button class="w-full sm:w-auto border border-gray-400 text-black px-4 sm:px-6 py-3 rounded-full hover:bg-gray-100 transition transform hover:scale-105">
                    Add to Wishlist
                </button> 
                --}}
            </div>

        </article>
    </section>
</x-layout>
