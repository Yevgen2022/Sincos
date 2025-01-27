@extends('CardDetail.index')
@section('reviewContent')

{{--<div>--}}
{{--    @foreach($reviews as $review)--}}
{{--        <p>{{ $review->review }}</p>--}}
{{--    @endforeach--}}
{{--</div>--}}


    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-lg font-medium text-gray-900">Recent reviews</h2>
            @foreach($reviews as $review)

            <div class="mt-6 space-y-10 divide-y divide-gray-200 border-b border-t border-gray-200 pb-10">
                <div class="pt-10 lg:grid lg:grid-cols-12 lg:gap-x-8">
                    <div class="lg:col-span-8 lg:col-start-5 xl:col-span-9 xl:col-start-4 xl:grid xl:grid-cols-3 xl:items-start xl:gap-x-8">
                        <div class="flex items-center xl:col-span-1">
                            <div class="flex items-center">

                                <!-- Active: "text-yellow-400", Inactive: "text-gray-200" -->

                                <x-star-rating :rating="$review->user_rating"/>


                            </div>

                            <p class="ml-3 text-sm text-gray-700">/ 5<span class="sr-only"> out of 5 stars</span></p>
                        </div>

                        <div class="mt-4 lg:mt-6 xl:col-span-2 xl:mt-0">
{{--                            <h3 class="text-sm font-medium text-gray-900">Can&#039;t say enough good things</h3>--}}

                            <div class="mt-3 space-y-6 text-sm text-gray-500">
                                <p>{{ $review->review }}</p>
{{--                                <p>The product quality is amazing, it looks and feel even better than I had anticipated.--}}
{{--                                    Brilliant stuff! I would gladly recommend this store to my friends. And, now that I--}}
{{--                                    think of it... I actually have, many times!</p>--}}
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center text-sm lg:col-span-4 lg:col-start-1 lg:row-start-1 lg:mt-0 lg:flex-col lg:items-start xl:col-span-3">
                        <p class="font-medium text-gray-900">{{ $review->user->name }}</p>
                        <time datetime="2021-01-06"
                              class="ml-4 border-l border-gray-200 pl-4 text-gray-500 lg:ml-0 lg:mt-2 lg:border-0 lg:pl-0">
                            {{$review->created_at}}
                        </time>
                    </div>
                </div>
                <!-- More reviews... -->
            </div>
            @endforeach
        </div>
    </div>

@endsection
