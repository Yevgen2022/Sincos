@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-4xl bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Categories</h2>

            <ul role="list" class="divide-y divide-gray-200 border border-gray-300 rounded-lg">
                @foreach($categories as $category)
                    <li class="flex justify-between items-center gap-x-6 py-5 px-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="truncate text-sm text-gray-700 font-medium">{{ $category->name }}</p>
                            </div>
                        </div>
                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm text-gray-500">Co-Founder / CEO</p>
                            <p class="mt-1 text-xs text-gray-400">Last seen
                                <time datetime="2023-01-23T13:23Z">3h ago</time>
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection





