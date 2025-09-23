<x-layout>
    {{-- <section class="relative bg-[url('/images/background-1.jpg')] bg-cover bg-center h-screen flex items-center px-10 md:px-20"> --}}
    {{-- <section class="relative bg-cover bg-center h-screen flex items-center px-10 md:px-20 " style="background-image: url('{{ asset('images/background-1.jpg') }}')"> --}}
    <section class="relative bg-cover bg-center h-screen flex items-center px-10 md:px-20 bg-hero">
        <div class="max-w-2xl text-white">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 leading-tight">FIND CLOTHES THAT MATCH YOUR STYLE</h1>
            <p class="mb-8 text-gray-200">Browse our diverse range of clothes to express your individuality and perfect your style.</p>
            <a href="/">
                <button class="bg-white text-black font-semibold py-3 px-6 rounded-full shadow-lg hover:shadow-xl transition duration-300">Shop Now</button>
            </a>

            <div class="flex gap-10 mt-12">
                <div class="flex flex-col">
                    <span class="text-4xl font-bold">200+</span>
                    <span class="text-sm text-gray-300">International Brands</span>
                </div>
                <div class="flex flex-col border-l border-r px-8 border-gray-400">
                    <span class="text-4xl font-bold">2000+</span>
                    <span class="text-sm text-gray-300">High-Quality Products</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-4xl font-bold">30,000+</span>
                    <span class="text-sm text-gray-300">Happy Customers</span>
                </div>
            </div>
        </div>
    </section>

    {{-- New Arrivals --}}
    <section class="py-16 px-10 md:px-20 bg-gray-50">
        <h2 class="text-3xl font-bold mb-8">New Arrivals</h2>
        <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
            @foreach ($products as $product)
                <a href="{{ route('product.show', $product) }}" class="group">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden transform hover:scale-105 transition duration-300">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-lg text-gray-800 group-hover:text-black">{{ $product->name }}</h3>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    {{-- Categories --}}
    <section class="py-16 px-10 md:px-20 bg-white">
        <h2 class="text-3xl font-bold mb-8">Categories</h2>
        <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
            @foreach ($categories as $category)
                <a href="{{ route('category.show', $category) }}" class="group">
                    <div class="bg-gray-100 rounded-xl shadow-md overflow-hidden transform hover:scale-105 transition duration-300">
                        <img src="{{ $category->image }}" alt="{{ $category->name }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-lg text-gray-800 group-hover:text-black">{{ $category->name }}</h3>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
</x-layout>   