<x-layout>
    <section class="py-16 px-10 md:px-20 bg-gray-50 min-h-screen">
     

        @if ($categories->isEmpty())
            <p class="text-gray-500">No Category available.</p>
        @else
            <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                @foreach ($categories as $category)
                    <a href="{{ route('category.show', $category->id) }}" class="group">
                        <div class="bg-white rounded-xl shadow-md overflow-hidden transform hover:scale-105 transition duration-300">
                            @if ($category->image)
                                <img src="{{ $category->image }}" alt="{{ $category->name }}" class="w-full h-48 object-cover">
                            @endif
                            <div class="p-4 space-y-2">
                                <h3 class="font-semibold text-lg text-gray-800 group-hover:text-black">{{ $category->name }}</h3>
                                <p class="text-sm text-gray-500 truncate">{{ $category->description }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </section>
</x-layout>
