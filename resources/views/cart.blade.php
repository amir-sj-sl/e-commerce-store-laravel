<x-layout>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 py-12">
        <h1 class="text-2xl sm:text-3xl font-bold mb-8 text-gray-900">Your Cart</h1>

        @if(isset($cart) && $cartItems->count() > 0)

            {{-- Cart Items --}}
            <div class="flex flex-col gap-4">
                @foreach($cartItems as $item)
                    <div class="flex flex-col sm:flex-row justify-between items-center bg-white p-4 rounded-xl shadow hover:shadow-lg transition">
                        
                        {{-- Product Info --}}
                        <div class="flex items-center gap-4 mb-2 sm:mb-0 flex-1">
                            <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded">
                            <div class="font-semibold text-gray-800">{{ $item->product->name }}</div>
                        </div>

                        {{-- Quantity Update --}}
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center gap-2 mb-2 sm:mb-0">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1"
                                   class="w-16 sm:w-20 border border-gray-300 rounded text-center py-1 focus:outline-none focus:ring-2 focus:ring-black"/>
                            <button type="submit" class="text-blue-600 font-medium hover:text-blue-800 transition">
                                Update
                            </button>
                        </form>

                        {{-- Subtotal with animation --}}
                        <div class="text-gray-700 font-medium mb-2 sm:mb-0 transition-all duration-300 ease-in-out">
                            ${{ number_format($item->product->price * $item->quantity, 2) }}
                        </div>

                        {{-- Remove Button --}}
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 font-medium hover:text-red-800 transition">
                                Remove
                            </button>
                        </form>

                    </div>
                @endforeach
            </div>

            {{-- Total & Checkout --}}
            <div class="mt-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="text-lg sm:text-xl font-semibold text-gray-900 transition-all duration-300 ease-in-out">
                    Total: ${{ number_format($cartItems->sum(fn($i) => $i->product->price * $i->quantity), 2) }}
                </div>

                <a href="{{ route('checkout.show') }}"
                   class="bg-black text-white px-6 py-3 rounded-full font-medium hover:bg-gray-800 transition transform hover:scale-105">
                    Continue to Checkout
                </a>
            </div>

        @else
            <p class="text-gray-500 text-center py-12 text-lg">Your cart is empty.</p>
        @endif
    </section>
</x-layout>
