<x-layout>

    {{-- Status Message --}}
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('status') }}
        </div>
    @endif

    {{-- Add New Product Button --}}
    <div class="mb-6">
        <a href="{{ route('admin.product.add') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition">
            Add New Product
        </a>
    </div>

    {{-- Products Table --}}
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">ID</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Name</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Category</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Price</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Sell Price</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Featured</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Stock</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Created At</th>
                    <th scope="col" class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Edit</th>
                    <th scope="col" class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Delete</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.product.show', $product->id) }}" class="text-blue-600 hover:underline">
                                {{ $product->id }}
                            </a>
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.product.show', $product->id) }}" class="hover:text-blue-600 hover:underline">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.category.show', $product->category->id) }}" class="hover:text-blue-600 hover:underline">
                                {{ $product->category->name }}
                            </a>
                        </td>
                        <td class="px-4 py-2">{{ $product->status }}</td>
                        <td class="px-4 py-2">${{ number_format($product->price, 2) }}</td>
                        <td class="px-4 py-2">{{ $product->sell_price  != null ? '$'.$product->sell_price : ''}}</td>
                        <td class="px-4 py-2">{{ $product->featured == true ? 'featured' : ''}}</td>
                        <td class="px-4 py-2">{{ $product->stock }}</td>
                        <td class="px-4 py-2">{{ $product->created_at->format('Y-m-d') }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('admin.product.edit', $product->id) }}" class="text-black bg-blue-600 px-3 py-1 rounded hover:bg-blue-700 transition block">Edit</a>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white bg-red-600 px-3 py-1 rounded hover:bg-red-700 transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $products->links() }}
    </div>

</x-layout>
