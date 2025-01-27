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

                    {{--                        <div class="mt-6 flex items-center">--}}
                    {{--                            <svg class="size-5 shrink-0 text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">--}}
                    {{--                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />--}}
                    {{--                            </svg>--}}
                    {{--                            <p class="ml-2 text-sm text-gray-500">In stock and ready to ship</p>--}}
                    {{--                        </div>--}}
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
                        {{--                            <div class="sm:flex sm:justify-between">--}}
                        {{--                                <!-- Size selector -->--}}
                        {{--                                <fieldset>--}}
                        {{--                                    <legend class="block text-sm font-medium text-gray-700">Size</legend>--}}
                        {{--                                    <div class="mt-1 grid grid-cols-1 gap-4 sm:grid-cols-2">--}}
                        {{--                                        <!-- Active: "ring-2 ring-indigo-500" -->--}}
                        {{--                                        <div aria-label="18L" aria-description="Perfect for a reasonable amount of snacks." class="relative block cursor-pointer rounded-lg border border-gray-300 p-4 focus:outline-none">--}}
                        {{--                                            <input type="radio" name="size-choice" value="18L" class="sr-only">--}}
                        {{--                                            <p class="text-base font-medium text-gray-900">18L</p>--}}
                        {{--                                            <p class="mt-1 text-sm text-gray-500">Perfect for a reasonable amount of snacks.</p>--}}
                        {{--                                            <!----}}
                        {{--                                              Active: "border", Not Active: "border-2"--}}
                        {{--                                              Checked: "border-indigo-500", Not Checked: "border-transparent"--}}
                        {{--                                            -->--}}
                        {{--                                            <div class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true"></div>--}}
                        {{--                                        </div>--}}
                        {{--                                        <!-- Active: "ring-2 ring-indigo-500" -->--}}
                        {{--                                        <div aria-label="20L" aria-description="Enough room for a serious amount of snacks." class="relative block cursor-pointer rounded-lg border border-gray-300 p-4 focus:outline-none">--}}
                        {{--                                            <input type="radio" name="size-choice" value="20L" class="sr-only">--}}
                        {{--                                            <p class="text-base font-medium text-gray-900">20L</p>--}}
                        {{--                                            <p class="mt-1 text-sm text-gray-500">Enough room for a serious amount of snacks.</p>--}}
                        {{--                                            <!----}}
                        {{--                                              Active: "border", Not Active: "border-2"--}}
                        {{--                                              Checked: "border-indigo-500", Not Checked: "border-transparent"--}}
                        {{--                                            -->--}}
                        {{--                                            <div class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true"></div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </fieldset>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="mt-4">--}}
                        {{--                                <a href="#" class="group inline-flex text-sm text-gray-500 hover:text-gray-700">--}}
                        {{--                                    <span>What size should I buy?</span>--}}
                        {{--                                    <svg class="ml-2 size-5 shrink-0 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">--}}
                        {{--                                        <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0ZM8.94 6.94a.75.75 0 1 1-1.061-1.061 3 3 0 1 1 2.871 5.026v.345a.75.75 0 0 1-1.5 0v-.5c0-.72.57-1.172 1.081-1.287A1.5 1.5 0 1 0 8.94 6.94ZM10 15a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />--}}
                        {{--                                    </svg>--}}
                        {{--                                </a>--}}
                        {{--                            </div>--}}
                        <div class="mt-10">
                            <button type="submit"
                                    class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50">
                                Add to bag
                            </button>
                        </div>
                        {{--                            <div class="mt-6 text-center">--}}
                        {{--                                <a href="#" class="group inline-flex text-base font-medium">--}}
                        {{--                                    <svg class="mr-2 size-6 shrink-0 text-gray-400 group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">--}}
                        {{--                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />--}}
                        {{--                                    </svg>--}}
                        {{--                                    <span class="text-gray-500 hover:text-gray-700">Lifetime Guarantee</span>--}}
                        {{--                                </a>--}}
                        {{--                            </div>--}}
                    </form>


                    <div class="mt-16">
                        <a href="{{ route ('product.reviews', $product->id) }}" id="show-reviews"
                           class="text-indigo-600 hover:text-blue-300 active:text-indigo-600">Show reviews ...</a>
                    </div>


                </section>
            </div>

        </div>


        <div>
            @yield('reviewContent')
        </div>


    </div>

@endsection
