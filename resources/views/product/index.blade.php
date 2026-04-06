<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Header --}}
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Product List</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Manage your product inventory</p>
                        </div>

                        <div class="flex gap-2">
                            <a href="{{ route('product.create') }}"
                               class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow">
                                Add Product
                            </a>

                            @can('export-product')
                                <a href="{{ route('products.export') }}"
                                   class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
                                    Export
                                </a>
                            @endcan
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
                        <table class="min-w-full text-sm">
                            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                                <tr>
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2 text-left">Name</th>
                                    <th class="px-4 py-2">Qty</th>
                                    <th class="px-4 py-2">Price</th>
                                    <th class="px-4 py-2">Owner</th>
                                    <th class="px-4 py-2 text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y dark:divide-gray-600">
                                @forelse ($products as $product)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                        <td class="px-4 py-2 text-center">{{ $loop->iteration }}</td>

                                        <td class="px-4 py-2 font-medium">{{ $product->name }}</td>

                                        <td class="px-4 py-2 text-center">{{ $product->quantity }}</td>

                                        <td class="px-4 py-2 text-center font-mono">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </td>

                                        <td class="px-4 py-2 text-center">
                                            {{ $product->user->name ?? '-' }}
                                        </td>

                                        <td class="px-4 py-2">
                                            <div class="flex justify-center gap-2">

                                                {{-- VIEW --}}
                                                <a href="{{ route('product.show', $product->id) }}"
                                                   class="p-2 rounded hover:bg-indigo-100 dark:hover:bg-indigo-900"
                                                   title="View">
                                                    👁️
                                                </a>

                                                {{-- EDIT --}}
                                                @can('update', $product)
                                                    <a href="{{ route('product.edit', $product) }}"
                                                       class="p-2 rounded hover:bg-yellow-100 dark:hover:bg-yellow-900"
                                                       title="Edit">
                                                        ✏️
                                                    </a>
                                                @endcan

                                                {{-- DELETE --}}
                                                @can('delete', $product)
                                                    <form action="{{ route('product.delete', $product->id) }}"
                                                          method="POST"
                                                          onsubmit="return confirm('Delete this product?')">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                                class="p-2 rounded hover:bg-red-100 dark:hover:bg-red-900"
                                                                title="Delete">
                                                            🗑️
                                                        </button>
                                                    </form>
                                                @endcan

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-6 text-gray-400">
                                            No products found.
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