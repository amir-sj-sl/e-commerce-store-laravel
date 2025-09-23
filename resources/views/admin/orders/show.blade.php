<x-layout>

    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('status') }}
        </div>
    @endif

    Order ID: {{$order->id}}
    User ID: {{$order->user_id}}
<hr/>
    
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
                        <td class="px-4 py-2">{{$orderItem->product->stock}}</td>
                        <td class="px-4 py-2">{{$orderItem->quantity}}</td>
                        <td class="px-4 py-2">{{$orderItem->price}}</td>
                        <td class="px-4 py-2">{{$orderItem->quantity * $orderItem->price}}</td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <td>total Price</td>
                </tr>
            </tfoot>
        </table>
    </div>
</x-layout>

