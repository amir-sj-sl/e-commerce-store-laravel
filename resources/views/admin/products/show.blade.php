<x-layout>
    <section class="container mx-auto px-6 py-12">

        {{-- Status Message --}}
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('status') }}
            </div>
        @endif

        {{-- Product Detail --}}
        <article class="bg-white rounded-xl shadow p-6 md:flex gap-8">

            {{-- Product Image (only if exists) --}}
            @if ($product->image)
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full md:w-1/3 h-auto object-cover rounded-lg mb-6 md:mb-0">
            @endif

            {{-- Product Info --}}
            <div class="flex-1 space-y-3">
                <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
                
                <p class="text-gray-600"><strong>ID:</strong> {{ $product->id }}</p>
                <p class="text-gray-600"><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
                <p class="text-gray-600"><strong>Status:</strong> 
                    <span class="{{ $product->status === 'active' ? 'text-green-600' : 'text-red-600' }}">
                        {{ ucfirst($product->status) }}
                    </span>
                </p>
                <p class="text-gray-600"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                <p class="text-gray-600"><strong>Stock:</strong> 
                    <span class="{{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $product->stock }}
                    </span>
                </p>
                <p class="text-gray-700"><strong>Description:</strong> {{ $product->description }}</p>
                <p class="text-gray-500 text-sm"><strong>Created At:</strong> {{ $product->created_at?->format('Y-m-d H:i') ?? 'N/A' }}</p>
                <p class="text-gray-500 text-sm"><strong>Updated At:</strong> {{ $product->updated_at?->format('Y-m-d H:i') ?? 'N/A' }}</p>

                {{-- Actions --}}
                <div class="flex gap-4 flex-wrap mt-4">
                    <a href="{{ route('admin.product.edit', $product->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Edit Product
                    </a>

                    <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                            Delete Product
                        </button>
                    </form>
                </div>
            </div>
        </article>
    </section>
</x-layout>
