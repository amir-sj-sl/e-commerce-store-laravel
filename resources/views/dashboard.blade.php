<x-layout>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 py-12">
        <h1 class="text-2xl sm:text-3xl font-bold mb-4 text-gray-900">Dashboard</h1>
        <h2 class="text-xl sm:text-2xl font-semibold mb-8 text-gray-900">Welcome User</h2>

        <a href="{{ route('cart', $user->id) }}">Visit My Cart</a>
        <a href="{{ route('profile.orders', $user->id) }}">Visit My Orders</a>
 
        <h3>My Profile</h3>
        <p>Name: {{$user->name}}</p>
        <p>Email: {{$user->email}}</p>
        <p>Address: {{$user->address}}</p>
        <p>Phone Number: {{$user->phone}}</p>

        <a href="{{ route('profile.edit', $user->id) }}">Edit Profile</a>
    </section>
</x-layout>
