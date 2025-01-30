@extends('layouts.app')

@section('content')
    <div class="bg-white border mx-12">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">

            <!-- Container for header and form -->
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Our Products</h2>

                <form method="GET" action="{{  route('productUser.index')}}">
                    <x-quick-search oninput="this.form.submit()" />
                </form>
            </div>

            <div class="mt-8 grid grid-cols-1 gap-y-10 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($products as $product)
                    @include('components.product-card', ['product' => $product])
                @endforeach
            </div>

            <!-- Пагінація -->
            <div class="mt-10">
                {{ $products->links('pagination::tailwind') }}
            </div>
        </div>


    </div>
@endsection
