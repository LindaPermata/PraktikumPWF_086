<x-app-layout>
    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#111827] text-white overflow-hidden shadow-2xl border border-gray-800 sm:rounded-xl">
                <div class="p-8">

                    {{-- Header --}}
                    <div class="flex items-center gap-4 mb-8">
                        <a href="{{ route('product.index') }}" 
                           class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-800 hover:bg-gray-700 text-gray-300 transition-all">
                            ←
                        </a>
                        <div>
                            <h2 class="text-2xl font-bold tracking-tight text-white">Edit Product</h2>
                            <p class="text-sm text-gray-400">{{ $product->name }}</p>
                        </div>
                    </div>

                    {{-- Hidden Delete Form --}}
                    <form id="delete-form" action="{{ route('product.delete', $product->id) }}" method="POST" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>

                    {{-- MAIN FORM --}}
                    <form action="{{ route('product.update', $product->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        {{-- NAME --}}
                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-300">Product Name</label>
                            {{-- Gunakan !bg-gray-800 untuk memaksa warna gelap --}}
                            <input type="text"
                                   name="name"
                                   value="{{ old('name', $product->name) }}"
                                   class="w-full px-4 py-2.5 rounded-lg !bg-gray-800 !text-white border-gray-700 focus:ring-2 focus:ring-indigo-500 outline-none border shadow-inner">
                            @error('name')
                                <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            {{-- QUANTITY --}}
                            <div>
                                <label class="block text-sm font-medium mb-2 text-gray-300">Quantity</label>
                                <input type="number"
                                       name="quantity"
                                       value="{{ old('quantity', $product->quantity) }}"
                                       class="w-full px-4 py-2.5 rounded-lg !bg-gray-800 !text-white border-gray-700 focus:ring-2 focus:ring-indigo-500 outline-none border shadow-inner">
                            </div>

                            {{-- PRICE --}}
                            <div>
                                <label class="block text-sm font-medium mb-2 text-gray-300">Price</label>
                                <input type="number"
                                       name="price"
                                       value="{{ old('price', $product->price) }}"
                                       class="w-full px-4 py-2.5 rounded-lg !bg-gray-800 !text-white border-gray-700 focus:ring-2 focus:ring-indigo-500 outline-none border shadow-inner">
                            </div>
                        </div>

                        {{-- OWNER --}}
                        <div>
                            <label class="block text-sm font-medium mb-2 text-gray-300">Owner</label>
                            <select name="user_id"
                                    class="w-full px-4 py-2.5 rounded-lg !bg-gray-800 !text-white border-gray-700 focus:ring-2 focus:ring-indigo-500 outline-none border">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id', $product->user_id) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- ACTIONS --}}
                        <div class="flex justify-between items-center pt-6 border-t border-gray-800">
                            @can('delete', $product)
                                <button type="button"
                                        onclick="if(confirm('Hapus produk?')) document.getElementById('delete-form').submit();"
                                        class="text-red-500 hover:underline text-sm font-medium">
                                    Delete Product
                                </button>
                            @endcan

                            <div class="flex gap-3">
                                <a href="{{ route('product.index') }}" class="px-5 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg text-sm">Cancel</a>
                                <button type="submit" class="px-6 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-lg text-sm font-bold shadow-lg shadow-indigo-500/20">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>