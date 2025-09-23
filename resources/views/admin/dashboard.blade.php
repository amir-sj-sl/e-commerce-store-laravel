<x-layout>
    <section class="container mx-auto p-6">
        {{-- Dashboard Header --}}
        <header class="mb-8">
            <h1 class="text-3xl md:text-4xl font-extrabold">Admin Dashboard</h1>
            <p class="text-gray-600 mt-2">Overview of your store's performance and statistics.</p>
        </header>

        {{-- Dashboard Cards --}}
        <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            
            {{-- Users --}}
            <article class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition duration-300 text-center">
                <h2 class="text-lg font-semibold text-gray-700">Users</h2>
                <p class="text-3xl font-bold mt-2">{{ $totalUsers }}</p>
            </article>

            {{-- Orders --}}
            <a href="{{ route('admin.orders') }}">
                <article class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition duration-300 text-center">
                    <h2 class="text-lg font-semibold text-gray-700">Orders</h2>
                    <p class="text-3xl font-bold mt-2">{{ $totalOrders }}</p>
                </article>
            </a>

            {{-- Products --}}
            <a href="{{ route('admin.products') }}">
                <article class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition duration-300 text-center">
                    <h2 class="text-lg font-semibold text-gray-700">Products</h2>
                    <p class="text-3xl font-bold mt-2">{{ $totalProducts }}</p>
                </article>
            </a>

            {{-- Categories --}}
            <a href="{{ route('admin.categories') }}">
                <article class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition duration-300 text-center">
                    <h2 class="text-lg font-semibold text-gray-700">Categories</h2>
                    <p class="text-3xl font-bold mt-2">{{ $totalCategories }}</p>
                </article>
            </a>

        </div>

        {{-- Optional: Quick Actions --}}
         <section class="mt-12 grid gap-4 sm:grid-cols-2 md:grid-cols-4">
            <a href="{{ route('admin.product.add') }}" class="bg-black text-white py-3 px-4 rounded-xl text-center hover:bg-gray-800 transition">
                Add New Product
            </a>
            <a href="{{ route('admin.category.add') }}" class="bg-black text-white py-3 px-4 rounded-xl text-center hover:bg-gray-800 transition">
                Add New Category
            </a>
            {{-- <a href="{{ route('admin.orders') }}" class="bg-black text-white py-3 px-4 rounded-xl text-center hover:bg-gray-800 transition">
                View Orders
            </a>
            <a href="{{ route('admin.users') }}" class="bg-black text-white py-3 px-4 rounded-xl text-center hover:bg-gray-800 transition">
                View Users
            </a>
        </section> --}}
    </section>
</x-layout>
