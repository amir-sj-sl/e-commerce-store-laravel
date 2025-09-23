<x-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Checkout</h1>

        <form method="POST" action="{{ route('checkout.store') }}" class="space-y-4">
            @csrf

            <div>
                <label for="address" class="block font-medium">Shipping Address</label>
                <textarea name="address" id="address" required
                    class="w-full border border-gray-300 rounded px-4 py-2 mt-1">{{ old('address') }}</textarea>
            </div>

            <h2 class="text-xl font-semibold mt-6">Your Items</h2>

            @foreach ($cart->items as $item)
                <div class="flex justify-between items-center bg-white p-4 rounded shadow">
                    <div>{{ $item->product->name }}</div>
                    <div>Qty: {{ $item->quantity }}</div>
                    <div>${{ number_format($item->product->price * $item->quantity, 2) }}</div>
                </div>
            @endforeach

            <div class="text-right font-bold text-lg mt-4">
                Total: ${{ number_format($cart->items->sum(fn($i) => $i->product->price * $i->quantity), 2) }}
            </div>

            <button type="submit" class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800">
                Place Order
            </button>
        </form>
    </div>
</x-layout>
