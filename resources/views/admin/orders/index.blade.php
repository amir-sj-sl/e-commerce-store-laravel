<x-layout>

    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('status') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow divide-y divide-gray-200">

            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Order ID</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">User ID</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Totoal Price</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Address</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Create Date</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($orders as $order)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.order.show', $order->id) }}" class="text-blue-600 hover:underline"> {{ $order->id }} </a>
                        </td>
                        <td class="px-4 py-2"> {{ $order->user_id }} </td>
                        <td class="px-4 py-2"> {{ $order->total_price }} </td>
                        <td class="px-4 py-2"> {{ $order->status }} </td>
                        <td class="px-4 py-2"> {{ $order->address }} </td>
                        <td class="px-4 py-2"> {{ $order->created_at }} </td>
                        {{-- <td class="px-4 py-2 text-center">
                            <a href="{{ route('admin.order.edit', $order->id) }}">
                                <button  type="submit" class="text-black bg-blue-600 px-3 py-1 rounded hover:bg-blue-700 transition">
                                    Edit
                                </button>
                            </a>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <form action="{{ route('admin.order.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Order?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white bg-red-600 px-3 py-1 rounded hover:bg-red-700 transition">
                                    Delete
                                </button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

     

</x-layout>

