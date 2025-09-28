<x-layout>
    <section class="container mx-auto px-6 py-12">

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

        {{-- Order Details --}}
        <article class="bg-white rounded-xl shadow p-6 gap-8">
            <div class="flex-1 space-y-3">
                <h1 class="text-3xl font-bold">Order ID: {{$order->id}}</h1>
                <p class="text-gray-600"><strong>User ID: </strong> {{$order->user_id}}</p>
                <p class="text-gray-600"><strong>User Name: </strong> {{$order->user->name}}</p>
                <p class="text-gray-600"><strong>Items: </strong> {{$orderItemsCount}}</p>
                <p class="text-gray-600"><strong>Total Price: </strong> {{$order->total_price}}</p>
                <p class="text-gray-600"><strong>Order Status: </strong> {{$order->status}}</p>
                <p class="text-gray-600"><strong>Order Adrress: </strong> {{$order->address}}</p>
            </div>

        
        
            <div class="overflow-x-auto">
                @if ($orderItemsCount > 0)
                <table class="min-w-full bg-white rounded-lg shadow divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th colspan="7" class="px-4 py-2 font-bold text-gray-700">Order Items</th>
                        </tr>
                        <tr>
                            <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Order Items ID</th>
                            <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Product Name</th>
                            <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Product Category</th>
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
                                <td class="px-4 py-2">{{$orderItem->product->category->name}}</td>
                                <td class="px-4 py-2 {{$orderItem->product->stock < $orderItem->quantity ? 'text-red-700' : ''}}">{{$orderItem->product->stock}}</td>
                                <td class="px-4 py-2">{{$orderItem->quantity}}</td>
                                <td class="px-4 py-2">{{$orderItem->price}}</td>
                                <td class="px-4 py-2">{{$orderItem->quantity * $orderItem->price}}</td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot class="bg-gray-100">
                        <tr>
                            <td colspan="7" class="px-4 py-2 font-bold text-center text-gray-700">total Price: ${{ number_format($order->orderItems->sum(fn($i) => $i->product->price * $i->quantity), 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
                @else 
                <div class="my-8">
                    <p class="text-center text-2xl">Theres no Item in this Order!</p>
                </div>
                @endif

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
        </article>

    </section>
</x-layout>

