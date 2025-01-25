<div class="bg-white">
    <div class="relative mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8 border">


        <!-- the location of the rating component -->
            <div class="absolute top-6 right-8 p-2">
                <x-star-rating :rating="$product->rating"/>
            </div>


        <div>
            <div class="relative">

                <div class="relative h-72 w-full overflow-hidden rounded-lg">
                    {{--                        <img src="https://tailwindui.com/plus/img/ecommerce-images/product-page-03-related-product-01.jpg" alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."--}}
                    <img src={{ $product->img_src }} alt="{{ $product->name }}" class="w-full h-full object-cover">
                </div>


                <div class="relative mt-4">
                    <h3 class="text-lg font-medium text-gray-900 line-clamp-2 h-14">{{ $product->name }}</h3>
                    <p class="mt-1 text-sm text-gray-500 italic line-clamp-2 h-11">{{ $product->description }}</p>
                </div>

                <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
                    <div aria-hidden="true"
                         class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                    <p class="relative text-lg font-bold text-indigo-600">{{ $product->formattedPrice() . " " . "kr" }}</p>
                </div>
            </div>


            <div class="mt-6">
                <a href="#" class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-300 px-8 py-2 text-sm font-medium text-gray-900 hover:bg-gray-200
                    @guest cursor-not-allowed opacity-50 @endguest @auth cursor-pointer active:text-gray-900 active:bg-gray-300 @endauth">Add
                    to bag<span class="sr-only">, Zip Tote Basket</span></a>
            </div>
        </div>
    </div>
</div>



