@extends('layouts.app')

@section('content')
    <div class="flex items-start justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-4xl bg-white shadow-md rounded-lg p-6 mt-10">
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Create Category</h2>

            <form action="{{ route('categories.create') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                           class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    >
                </div>

                <div class="flex justify-between">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Create
                    </button>
                    <a href="{{ route('category') }}"
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
