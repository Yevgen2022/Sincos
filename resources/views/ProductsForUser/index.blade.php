@extends('layouts.app')

@section('content')
    <div class="bg-white border  mx-5">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Our Products</h2>



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
