@extends('layouts.app')

@section('content')
    <div class="bg-white border mx-12">

        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">

            <!-- Product details -->
            <div class="lg:max-w-lg lg:self-end">
                <nav aria-label="Breadcrumb">
                    <ol role="list" class="flex items-center space-x-2">
                        <li>
                            <div class="flex items-center text-sm">
                                <a href="#" class="font-medium text-gray-500 hover:text-gray-900">
                                    <span class="text-black text-lg font-bold">Category :</span>
                                    {{ $product->category->name ?? 'Unknown Category' }}
                                </a>

                            </div>
                        </li>
                    </ol>
                </nav>

                <div class="mt-4">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $product->name }}</h1>
                </div>

                <section aria-labelledby="information-heading" class="mt-4">
                    {{--                        <h2 id="information-heading" class="sr-only">Product information</h2>--}}

                    <div class="flex items-center">
                        <p class="text-lg text-gray-900 sm:text-xl">{{ $product->formattedPrice()}} kr</p>

                        <div class="ml-4 border-l border-gray-300 pl-4">
                            <h2 class="sr-only">Reviews</h2>
                            <div class="flex items-center">

                                <x-star-rating :rating="$averageRating"/>
                                <p class="ml-2 text-sm text-gray-500">{{$reviewCount}} reviews</p>

                            </div>
                        </div>
                    </div>

                    <div class="mt-4 space-y-6">
                        <p class="text-base text-gray-500">{{ $product->description }}</p>
                    </div>
                </section>
            </div>


            <!-- Product image -->
            <div class="mt-10 lg:col-start-2 lg:row-span-2 lg:mt-0 lg:self-center bg-gray-100">
                <img src="{{ $product->img_src }}" alt="Fot not found"
                     class="aspect-square w-full rounded-lg object-cover">
            </div>

            <!-- Product form -->
            <div class="mt-10 lg:col-start-1 lg:row-start-2 lg:max-w-lg lg:self-start">
                <section aria-labelledby="options-heading">
                    <h2 id="options-heading" class="sr-only">Product options</h2>

                    <form>
                        <div class="mt-10">
                            <button type="submit"
                                    class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50">
                                Add to bag
                            </button>
                        </div>
                    </form>

                    <div class="mt-16">
                        <a href="{{ route ('product.reviews', $product->id) }}" class="text-indigo-600 hover:text-blue-300 active:text-indigo-600">Show reviews ...</a>
                    </div>
                </section>
            </div>

        </div>


        <div>
            @yield('reviewContent')
        </div>


    </div>

@endsection
