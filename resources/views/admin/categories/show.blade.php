<x-layout>
    <section class="container mx-auto px-6 py-12">

        {{-- Status Message --}}
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('status') }}
            </div>
        @endif

        {{-- Category Detail --}}
        <article class="bg-white rounded-xl shadow p-6 md:flex gap-8">

            {{-- Category Image (only if exists) --}}
            @if ($category->image)
                <img src="{{ $category->image }}" alt="{{ $category->name }}" class="w-full md:w-1/3 h-auto object-cover rounded-lg mb-6 md:mb-0">
            @endif

            {{-- Category Info --}}
            <div class="flex-1 space-y-3">
                <h1 class="text-3xl font-bold">{{ $category->name }}</h1>
                
                <p class="text-gray-600"><strong>ID:</strong> {{ $category->id }}</p>
                <p class="text-gray-600"><strong>Slug:</strong> {{ $category->slug ?? 'N/A' }}</p>
                <p class="text-gray-600"><strong>Status:</strong> 
                    <span class="{{ $category->status === 'active' ? 'text-green-600' : 'text-red-600' }}">
                        {{ ucfirst($category->status) }}
                    </span>
                </p>
                <p class="text-gray-600"><strong>Number of Products:</strong> {{$productsCount}}</p>
                <p class="text-gray-700"><strong>Description:</strong> {{ $category->description }}</p>
                <p class="text-gray-500 text-sm"><strong>Created At:</strong> {{ $category->created_at?->format('Y-m-d H:i') ?? 'N/A' }}</p>
                <p class="text-gray-500 text-sm"><strong>Updated At:</strong> {{ $category->updated_at?->format('Y-m-d H:i') ?? 'N/A' }}</p>

                {{-- Actions --}}
                <div class="flex gap-4 flex-wrap mt-4">
                    <a href="{{ route('admin.category.edit', $category->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Edit Category
                    </a>

                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                            Delete Category
                        </button>
                    </form>

                    <form action="{{ route('admin.category.active', $category->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">{{ $category->status == 'active' ? 'Inactivate Category' : 'Activate Category' }}</button>
                    </form>

                    <form action="{{ route('admin.product.addToCategory', $category->id) }}">
                        @csrf
                        <input type="number" name="category_id" id="category_id" value="{{$category->id}}" hidden>
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                            Add Product to this Category
                        </button>
                    </form>
                </div>

                    

            </div>
        </article>

        <div class="overflow-x-auto">
           @if ($productsCount > 0)
            <table class="min-w-full bg-white rounded-lg shadow divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th colspan=9 class="px-4 py-2 text-cener font-bold text-gray-700">Category Products</th>
                </tr>
                <tr>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Product ID</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Product Name</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Product Stock</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Price</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Sell Price</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Featured</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">status</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Created At</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Updated At</th>
                    <th scope="col" class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Edit</th>
                    <th scope="col" class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($category->products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.product.show', $product->id) }}" class="text-blue-600 hover:underline">
                                {{$product->id}}
                            </a>
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.product.show', $product->id) }}" class="hover:text-blue-600 hover:underline">
                                {{$product->name}}
                            </a>
                        </td>
                        <td class="px-4 py-2">{{$product->stock}}</td>
                        <td class="px-4 py-2">{{$product->price}}</td>
                        <td class="px-4 py-2">{{$product->sell_price  != null ? '$'.$product->sell_price : ''}}</td>
                        <td class="px-4 py-2">{{$product->featured == true ? 'featured' : ''}}</td>
                        <td class="px-4 py-2">{{$product->status}}</td>
                        <td class="px-4 py-2">{{$product->created_at}}</td>
                        <td class="px-4 py-2">{{$product->updated_at}}</td>
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
            @else 
            <div class="my-8">
                <p class="text-center text-2xl">Theres no product in this category!</p>
            </div>
            @endif
        </div>
        
    </section>
</x-layout>
