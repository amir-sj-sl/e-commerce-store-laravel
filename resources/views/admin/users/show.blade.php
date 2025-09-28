<x-layout>
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('status') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="bg-red-100  border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            {{ session('error') }}
        </div>
    @endif

    <p>User Name: {{$user->name}}</p>
    <p>User Email: {{$user->email}}</p>
    <p>User Verify Status: {{ $user->email_verified_at != null ? 'Verifyed' : 'Not Verifyed' }}</p>
    <p>User Role: {{ $user->is_admin ? 'Admin' : 'Member' }}</p>
    <p>Member Since: {{ $user->created_at }}</p>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th colspan="6" class="py-2 font-bold text-gray-700 border-b-1"> User Orders History</th>
                </tr>
                <tr>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Order ID</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Total Price</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Address</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Create Date</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Update Date</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($user->orders as $order)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.order.show', $order->id) }}">{{$order->id}}</a>
                        </td>
                        <td class="px-4 py-2">{{$order->total_price}}</td>
                        <td class="px-4 py-2">{{$order->status}}</td>
                        <td class="px-4 py-2">{{$order->address}}</td>
                        <td class="px-4 py-2">{{$order->created_at}}</td>
                        <a href=""><td class="px-4 py-2">{{$order->updated_at}}</td></a>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div class="flex gap-4 flex-wrap mt-4">
            {{-- <a href="{{ route('admin.user.edit', $user->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"> --}}
            <a href="" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Edit User
            </a>

            {{-- <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');"> --}}
            <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this User?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                    Delete User
                </button>
            </form>
        </div>
    </div>
</x-layout>

