<x-layout>

    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('status') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow divide-y divide-gray-200">

            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">User ID</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Name</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Verify Status</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Role</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Create Date</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.user.show', $user->id) }}" class="text-blue-600 hover:underline"> {{ $user->id }} </a>
                        </td>
                        <td class="px-4 py-2"> {{ $user->name }} </td>
                        <td class="px-4 py-2"> {{ $user->email_verified_at != null ? 'Verifyed' : 'Not Verifyed' }} </td>
                        <td class="px-4 py-2"> {{ $user->is_admin ? 'Admin' : 'Member' }} </td>
                        <td class="px-4 py-2"> {{ $user->created_at }} </td>
                        {{-- <td class="px-4 py-2 text-center">
                            <a href="{{ route('admin.user.edit', $user->id) }}">
                                <button  type="submit" class="text-black bg-blue-600 px-3 py-1 rounded hover:bg-blue-700 transition">
                                    Edit
                                </button>
                            </a>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Order?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white bg-red-600 px-3 py-1 rounded hover:bg-red-700 transition">
                                    Delete
                                </button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

     <div class="mt-6">
        {{ $users->links() }}
    </div>

</x-layout>

