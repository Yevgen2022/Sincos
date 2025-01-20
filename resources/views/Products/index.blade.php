@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-4xl bg-white shadow-md rounded-lg p-6 mt-10">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Products</h2>
                <a href="#"
                   class="text-sm text-white bg-green-500 hover:bg-green-600 px-4 py-2 rounded-lg transition">
                    Create Product
                </a>
            </div>

            <ul role="list" class="divide-y divide-gray-200 border border-gray-300 rounded-lg">
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <img class="size-12 flex-none rounded-full bg-gray-50"
                             src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                             alt="">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-semibold text-gray-900">Leslie Alexander</p>
                            <p class="mt-1 truncate text-xs/5 text-gray-500">leslie.alexander@example.com</p>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <p class="text-sm/6 text-gray-900">Co-Founder / CEO</p>
                        <p class="mt-1 text-xs/5 text-gray-500">Last seen
                            <time datetime="2023-01-23T13:23Z">3h ago</time>
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

@endsection





