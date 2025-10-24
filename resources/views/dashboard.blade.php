<x-layout>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 py-12">
        <h1 class="text-2xl sm:text-3xl font-bold mb-4 text-gray-900">Dashboard</h1>
        <h2 class="text-xl sm:text-2xl font-semibold mb-8 text-gray-900">Welcome {{$user->name}}</h2>

        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mb-4">
            <a href="{{ route('cart', $user->id)  }}" class=" bg-black text-white px-4 sm:px-6 py-3 rounded-full font-medium hover:bg-gray-800 transition transform hover:scale-105 disabled:bg-gray-400 disabled:hover:bg-gray-400 disabled:hover:scale-100">
                Visit My Cart
            </a>
            <a href="{{ route('profile.orders', $user->id)  }}" class=" bg-black text-white px-4 sm:px-6 py-3 rounded-full font-medium hover:bg-gray-800 transition transform hover:scale-105 disabled:bg-gray-400 disabled:hover:bg-gray-400 disabled:hover:scale-100">
                Visit My Orders
            </a>
            <a href="{{ route('profile.edit', $user->id)  }}" class=" bg-black text-white px-4 sm:px-6 py-3 rounded-full font-medium hover:bg-gray-800 transition transform hover:scale-105 disabled:bg-gray-400 disabled:hover:bg-gray-400 disabled:hover:scale-100">
                Edit Profile
            </a>
        </div>
 
        <h3 class="text-2xl sm:text-3xl md:text-4xl  text-gray-900 mb-4">My Profile</h3>
        <p class="text-xl sm:text-2xl md:text-3xl" >Name: {{$user->name}}</p>
        <p class="text-xl sm:text-2xl md:text-3xl" >Email: {{$user->email}}</p>
        <p class="text-xl sm:text-2xl md:text-3xl" >Address: {{$user->address}}</p>
        <p class="text-xl sm:text-2xl md:text-3xl" >Phone Number: {{$user->phone}}</p>

        
    </section>
</x-layout>
