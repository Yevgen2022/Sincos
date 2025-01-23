@extends('layouts.app')

@section('content')
    <div class="flex items-start justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-4xl bg-white shadow-md rounded-lg p-6 mt-10">
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Edit Product</h2>


            <form action="{{ route('product.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" id="product_name" name="name" value="{{ old('name', $product->name) }}"
                           class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="product_category" class="block text-sm font-medium text-gray-700">Product
                        Category</label>
                    <select id="product_category" name="category"
                            class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <!-- Placeholder, якщо категорія не вибрана -->
                        <option value="{{ $product->category_id }}">
                            {{  $currentCategoryName }}
                        </option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }} <!-- Виводимо назву категорії -->
                            </option>
                        @endforeach
                    </select>

                    @error('category')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="product_description" class="block text-sm font-medium text-gray-700">Product
                        Description</label>
                    <textarea id="product_description" name="description"
                              class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="product_price" class="block text-sm font-medium text-gray-700">Product Price</label>
                    <input type="text" id="product_price" name="price"
                           value="{{ old('price', $product->formattedPrice()) }}"
                           class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Update
                    </button>
                    <a href="{{ route('products') }}"
                       class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>


    {{--    @if(session('success'))--}}
    {{--        <script>--}}
    {{--            alert("{{ session('success') }}");--}}
    {{--        </script>--}}
    {{--    @endif--}}

@endsection
