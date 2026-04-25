<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Header --}}
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Category List</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Manage your category</p>
                        </div>

                        <div class="flex gap-2">
                            <a href="{{ route('category.create') }}"
                               class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow">
                                + Add Category
                            </a>
                        </div>
                    </div>

                    {{-- Flash Message --}}
                    @if (session('success'))
                        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Table --}}
                    <div class="overflow-x-auto border rounded-lg">
                        <table class="min-w-full text-sm text-left">
                            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                                <tr>
                                    <th class="px-6 py-3 font-semibold uppercase tracking-wider">#</th>
                                    <th class="px-6 py-3 font-semibold uppercase tracking-wider">NAME</th>
                                    <th class="px-6 py-3 font-semibold uppercase tracking-wider">TOTAL PRODUCT</th>
                                    <th class="px-6 py-3 font-semibold uppercase tracking-wider text-center">ACTION</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y dark:divide-gray-600">
                                @forelse ($categories as $category)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                        <td class="px-6 py-4">{{ $loop->iteration }}</td>

                                        <td class="px-6 py-4 font-medium">{{ $category->name }}</td>

                                        <td class="px-6 py-4">{{ $category->products->count() }}</td>

                                        <td class="px-6 py-4">
                                            <div class="flex justify-center gap-2">
                                                {{-- EDIT --}}
                                                <a href="{{ route('category.edit', $category) }}"
                                                   class="p-2 rounded hover:bg-yellow-100 dark:hover:bg-yellow-900"
                                                   title="Edit">
                                                    ✏️
                                                </a>

                                                {{-- DELETE --}}
                                                <form action="{{ route('category.destroy', $category) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Delete this category? All related products will also be affected.')">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="p-2 rounded hover:bg-red-100 dark:hover:bg-red-900"
                                                            title="Delete">
                                                        🗑️
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-6 text-gray-400">
                                            No categories found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
