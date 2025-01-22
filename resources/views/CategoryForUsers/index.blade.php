
@extends('layouts.app')

@section('content')
    <div class="bg-white py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Categories</h1>

            <!-- Dropdown для вибору категорій -->
            <div class="mb-8">
                <label for="category-select" class="block text-sm font-medium text-gray-700">Select Category:</label>
                <!-- Форма, яка передає параметр categoryId через GET запит -->
                <form method="GET" action="{{ route('categoryforusers.filter') }}">
                    <select id="category-select" name="categoryId" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border-2 p-2" onchange="this.form.submit()">
                        <option value="">Choose a Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request()->categoryId == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
{{--                    <button type="submit" class="mt-2 px-4 py-2 bg-indigo-600 text-white rounded-md shadow">Filter</button>--}}
                </form>
            </div>

{{--            <!-- Область для відображення контенту -->--}}
            <div id="category-content" class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-3 xl:gap-x-8">
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <div class="border rounded-lg shadow p-4">
                            <h3 class="text-lg font-medium text-gray-900">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $product->description }}</p>
                            <p class="mt-2 text-lg font-bold text-indigo-600">{{ $product->formattedPrice() }}</p>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-500">No products available for this category.</p>
                @endif
            </div>

        </div>
    </div>
@endsection
