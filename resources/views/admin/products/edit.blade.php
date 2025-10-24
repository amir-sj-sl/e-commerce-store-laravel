<x-layout>
    <section class="container mx-auto px-6 py-12 max-w-3xl">
        <h1 class="text-3xl font-bold mb-6">Edit Product</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.product.update', $product->id)}}" method="POST" class="bg-white p-6 rounded-xl shadow space-y-6">
            @csrf
            @method('PATCH')

            <div>
                <label for="name" class="block font-semibold mb-1">Product Name</label>
                <input type="text" name="name" id="name" required value="{{ $product->name }}"
                      class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block font-semibold mb-1">Description</label>
                <textarea name="description" id="description" rows="4" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">{{ $product->description }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="price" class="block font-semibold mb-1">Price</label>
                    <input type="number" min="0" step="0.01" name="price" id="price" required value="{{ $product->price }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                    @error('price')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            <div>
                <label for="sell_price" class="block font-semibold mb-1">Sell Price</label>
                <input type="number" min="0" step="0.01" name="sell_price" id="sell_price"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                @error('sell_price')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <fieldset class="flex gap-6 items-center">
                <legend class="font-semibold">featured</legend>
                <label class="flex items-center gap-2">
                    <input type="radio" name="featured" value=1 required> featured
                </label>
                <label class="flex items-center gap-2">
                    <input type="radio" name="featured" value=0> not featured
                </label>
                @error('featured')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </fieldset>

                <div>
                    <label for="stock" class="block font-semibold mb-1">Stock</label>
                    <input type="number" min="0" name="stock" id="stock" required value="{{ $product->stock }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                    @error('stock')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="image" class="block font-semibold mb-1">Image URL</label>
                <input type="text" name="image" id="image" value="{{ $product->image }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                @error('image')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <fieldset class="flex gap-6 items-center">
                <legend class="font-semibold">Status</legend>
                <label class="flex items-center gap-2">
                    <input type="radio" name="status" value="active" required {{ $product->status == 'active' ? 'checked' : '' }}> Active
                </label>
                <label class="flex items-center gap-2">
                    <input type="radio" name="status" value="inactive" {{ $product->status == 'inactive' ? 'checked' : '' }}> Inactive
                </label>
                @error('status')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </fieldset>

            <div>
                <label for="category_id" class="block font-semibold mb-1">Category</label>
                <select name="category_id" id="category_id" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800 transition">
                    Submit Change
                </button>
            </div>
        </form>
    </div>
</x-layout>
