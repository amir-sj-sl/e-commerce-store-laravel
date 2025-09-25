<x-layout>

    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('status') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="bg-red-100  border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            {{ session('error') }}
        </div>
    @endif

    <p>Order ID: {{$order->id}}</p>
    <p>User ID: {{$order->user_id}}</p>
    <p>Order Status: {{$order->status}}</p>
    <p>Order Adrress: {{$order->address}}</p>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Order Items ID</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Product Name</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Product Stock</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Order Quantity</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Price</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Total Price</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($order->orderItems as $orderItem)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{$orderItem->id}}</td>
                        <td class="px-4 py-2">{{$orderItem->product->name}}</td>
                        <td class="px-4 py-2 {{$orderItem->product->stock < $orderItem->quantity ? 'text-red-700' : ''}}">{{$orderItem->product->stock}}</td>
                        <td class="px-4 py-2">{{$orderItem->quantity}}</td>
                        <td class="px-4 py-2">{{$orderItem->price}}</td>
                        <td class="px-4 py-2">{{$orderItem->quantity * $orderItem->price}}</td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot class="bg-gray-100">
                <tr>
                    <td colspan="0" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">total Price: ${{ number_format($order->orderItems->sum(fn($i) => $i->product->price * $i->quantity), 2) }}</td>
                </tr>
            </tfoot>
        </table>

        @if ($order->status == 'pending')
        <div class="flex gap-4 flex-wrap mt-4">
            <form action="{{ route('admin.order.complete', $order->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Complete
                </button>
            </form>
        </div>
        @endif
    </div>
</x-layout>

