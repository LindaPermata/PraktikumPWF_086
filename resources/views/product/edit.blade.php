<x-app-layout>
    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl border border-gray-200 dark:border-gray-700">
                <div class="p-8">

                    {{-- Header --}}
                    <div class="flex items-center gap-4 mb-8">
                        <a href="{{ route('product.index') }}"
                           class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Product</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Update details for <span class="text-indigo-500 font-semibold">{{ $product->name }}</span></p>
                        </div>
                    </div>

                    {{-- Hidden Delete Form --}}
                    @can('delete', $product)
                    <form id="delete-product-form" action="{{ route('product.delete', $product->id) }}" method="POST" class="hidden">
                        @csrf @method('DELETE')
                    </form>
                    @endcan

                    {{-- Form Update --}}
                    <form action="{{ route('product.update', $product) }}" method="POST" class="space-y-6">
                        @csrf @method('PUT')

                        {{-- Input Styling Mixin (diaplikasikan ke semua input) --}}
                        @php $inputStyle = "w-full px-4 py-2.5 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"; @endphp

                        {{-- Name --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Product Name</label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="{{ $inputStyle }}">
                            @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Quantity & Price --}}
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Quantity</label>
                                <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}" class="{{ $inputStyle }}">
                                @error('quantity') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Price</label>
                                <input type="number" name="price" value="{{ old('price', $product->price) }}" class="{{ $inputStyle }}">
                                @error('price') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <hr class="border-gray-200 dark:border-gray-700 my-6">

                        {{-- Actions --}}
                        <div class="flex items-center justify-between mt-8">
                            {{-- TOMBOL DELETE BARU --}}
                            @can('delete', $product)
                            <button type="button" 
                                    onclick="if(confirm('Yakin mau hapus produk ini?')) document.getElementById('delete-product-form').submit();"
                                    class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-red-600 dark:text-red-400 border border-red-200 dark:border-red-900/50 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete
                            </button>
                            @endcan

                            <div class="flex gap-3">
                                <a href="{{ route('product.index') }}" 
                                   class="px-5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    Cancel
                                </a>

                                @can('update', $product)
                                <button type="submit" 
                                        class="px-6 py-2.5 text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-lg shadow-indigo-500/30 transition transform active:scale-95">
                                    Update Product
                                </button>
                                @endcan
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>