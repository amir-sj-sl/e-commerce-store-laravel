<x-layout>

    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('status') }}
        </div>
    @endif

    <div class="mb-6">
        <a href="{{ route('admin.category.add') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition">
            Add New Category
        </a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow divide-y divide-gray-200">

            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">ID</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Name</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Createed At</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Edit</th>
                    <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Delete</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($categories as $category)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.category.show', $category->id) }}" class="text-blue-600 hover:underline"> {{ $category->id }} </a>
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.category.show', $category->id) }}" class="hover:text-blue-600 hover:underline">
                                {{ $category->name }} 
                            </a>
                        </td>
                        <td class="px-4 py-2"> {{ $category->status }} </td>
                        <td class="px-4 py-2"> {{ $category->created_at->format('Y-m-d') }} </td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('admin.category.edit', $category->id) }}">
                                <button type="submit" class="text-black bg-blue-600 px-3 py-1 rounded hover:bg-blue-700 transition">
                                    Edit
                                </button>
                            </a>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
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
    </div>

    <div class="mt-6">
        {{ $categories->links() }}
    </div>

     

</x-layout>

