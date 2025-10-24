<x-layout>
    <section class="container mx-auto px-6 py-12 max-w-3xl">

        <h1 class="text-3xl font-bold mb-6">Add New Product</h1>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.product.store') }}" method="POST" class="bg-white p-6 rounded-xl shadow space-y-6">
            @csrf

            {{-- Name --}}
            <div>
                <label for="name" class="block font-semibold mb-1">Name</label>
                <input type="text" name="name" id="name" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block font-semibold mb-1">Description</label>
                <textarea name="description" id="description" rows="5" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black"></textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Price --}}
            <div>
                <label for="price" class="block font-semibold mb-1">Price</label>
                <input type="number" min="0" step="0.01" name="price" id="price" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                @error('price')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Sell Price --}}
            <div>
                <label for="sell_price" class="block font-semibold mb-1">Sell Price</label>
                <input type="number" min="0" step="0.01" name="sell_price" id="sell_price"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                @error('sell_price')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Featured --}}
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
            
            {{-- Stock --}}
            <div>
                <label for="stock" class="block font-semibold mb-1">Stock</label>
                <input type="number" min="0" name="stock" id="stock" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                @error('stock')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image --}}
            <div>
                <label for="image" class="block font-semibold mb-1">Image URL</label>
                <input type="text" name="image" id="image"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                @error('image')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <fieldset class="flex gap-6 items-center">
                <legend class="font-semibold">Status</legend>
                <label class="flex items-center gap-2">
                    <input type="radio" name="status" value="active" required> Active
                </label>
                <label class="flex items-center gap-2">
                    <input type="radio" name="status" value="inactive"> Inactive
                </label>
                @error('status')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </fieldset>

            {{-- Category Dropdown --}}
            <div>
                @if(isset($category))
                    <label for="category_id" class="block font-semibold mb-1">Category</label>
                    <select name="category_id" id="category_id" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                        <option value={{$category->id}}>{{$category->name}}</option>
                    </select>
                @else
                    <label for="category_id" class="block font-semibold mb-1">Category</label>
                    <select name="category_id" id="category_id" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-black">
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                @endif
                @error('category_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <div>
                <button type="submit" class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800 transition">
                    Add Product
                </button>
            </div>

        </form>
    </section>
</x-layout>
