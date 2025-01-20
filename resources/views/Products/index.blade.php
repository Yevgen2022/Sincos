@extends('layouts.app')

@section('content')
    <div class="flex items-start justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-4xl bg-white shadow-md rounded-lg p-6 mt-10">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Products</h2>
                <a href="#"
                   class="text-sm text-white bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg transition">
                    Create Product
                </a>
            </div>


            <ul role="list" class="divide-y divide-gray-200 border border-gray-300 rounded-lg">

                <li class="flex justify-between items-center gap-x-6 py-5 px-4">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="w-44 h-44 flex-none bg-gray-200 border border-gray-300">Foto of product</div>
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-semibold text-gray-900">Product name</p>
                            <p class="mt-1 truncate text-xs/5 text-gray-500">Product description</p>
                        </div>
                    </div>

                    <div class="hidden sm:flex sm:flex-col sm:items-end gap-4"> <!-- Додаємо gap для відстані між елементами -->
                        <a href="#"
                           class="text-sm text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg w-full text-center transition">
                            Edit
                        </a>
                        <form action="#" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this category?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 w-full">
                                Delete
                            </button>
                        </form>
                    </div>
                </li>

            </ul>

        </div>
    </div>

@endsection





