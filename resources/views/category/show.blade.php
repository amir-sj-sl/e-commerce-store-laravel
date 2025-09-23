<x-layout>
    {{-- Category Header --}}
    <section class="container mx-auto px-6 md:px-20 py-12">
        <header class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">{{ $category->name }}</h1>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg leading-relaxed">
                {{ $category->description }}
            </p>
        </header>

        {{-- Products Section --}}
        <section class="bg-gray-50 py-10 px-4 sm:px-6 md:px-10 rounded-xl shadow-inner">
            <h2 class="text-2xl font-bold mb-6">Products</h2>

            @if ($products->count())
                <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                    @foreach ($products as $product)
                        <article class="group block bg-white rounded-xl shadow-md overflow-hidden transform hover:scale-105 transition duration-300">
                            <a href="{{ route('product.show', $product) }}">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="font-semibold text-lg text-gray-800 group-hover:text-black">{{ $product->name }}</h3>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-10 flex justify-center">
                    {{ $products->links() }}
                </div>
            @else
                <p class="text-gray-500 text-center mt-8 text-lg">No products found in this category.</p>
            @endif
        </section>
    </section>
</x-layout>
