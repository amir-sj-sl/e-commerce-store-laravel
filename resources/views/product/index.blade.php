<x-layout>
    <section class="py-16 px-10 md:px-20 bg-gray-50 min-h-screen">
     

        @if ($products->isEmpty())
            <p class="text-gray-500">No products available.</p>
        @else
            <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                @foreach ($products as $product)
                    <a href="{{ route('product.show', $product->id) }}" class="group">
                        <div class="bg-white rounded-xl shadow-md overflow-hidden transform hover:scale-105 transition duration-300">
                            @if ($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                            @endif
                            <div class="p-4 space-y-2">
                                <h3 class="font-semibold text-lg text-gray-800 group-hover:text-black">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-500 truncate">{{ $product->description }}</p>
                                <p class="text-indigo-600 font-bold">${{ number_format($product->price, 2) }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </section>
</x-layout>
