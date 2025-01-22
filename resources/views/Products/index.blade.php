{{--@extends('layouts.app')--}}
@extends('admin.index')

@section('content')
    <div class="flex items-start justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-4xl bg-white shadow-md rounded-lg p-6 mt-10">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Products</h2>
                <a href="{{ route('product.showCreateForm') }}"
                   class="text-sm text-white bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg transition">
                    Create Product
                </a>
            </div>


            <ul role="list" class="divide-y divide-gray-200 border border-gray-300 rounded-lg">
                @foreach($products as $product)
                <li class="flex justify-between items-center gap-x-6 py-5 px-4">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="w-44 h-44 flex-none bg-gray-200 border border-gray-300 flex items-center justify-center text-gray-500">
                            Foto of product
                        </div>

                        <div class="min-w-0 flex-auto flex flex-col justify-between gap-y-2"> <!-- We center the elements -->
                            <!-- Product name located on top -->
                            <p class="text-sm font-semibold text-gray-900">{{ $product->name }}</p>

                            <!-- Product description -->
                            <p class="truncate text-xs text-gray-500 italic">{{ $product->description }}</p>

                            <!-- Product price located below -->
                            <div class="flex items-center justify-between">
                                <p class="truncate text-xs text-gray-500 mr-16">{{ $product->formattedPrice()  . ' ' .'kr' }}</p>

                                <div class="flex gap-x-4 ml-4"> <!-- Distance between links -->
                                    <a href="#" class="text-xs text-blue-500 hover:underline">Show Reviews</a>
                                    <a href="#" class="text-xs text-blue-500 hover:underline">Add Reviews</a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="hidden sm:flex sm:flex-col sm:items-end gap-4"> <!-- Distance between buttons -->
                        <a href="{{route ('product.showEditForm', $product->id) }}"
                           class="text-sm text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg w-full text-center transition">
                            Edit
                        </a>
                        <form action="{{route ('product.delete', $product->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this category?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 w-full">
                                Delete
                            </button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>

            <!-- Pagination -->
            <div class="pagination mt-4 ">
                {{ $products->links('pagination::tailwind') }} <!-- Виводить посилання для переходу між сторінками -->
            </div>

        </div>
    </div>

@endsection





