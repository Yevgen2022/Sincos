<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!--
                      Icon when menu is closed.

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                    <!--
                      Icon when menu is open.

                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex shrink-0 items-center">
{{--                    <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"--}}
{{--                         alt="Your Company">--}}
                </div>


                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white"   bg-gray-900 aria-current="page"-->


                        <a href="{{route('productUser.index')}}"
                           class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white
   @guest cursor-not-allowed opacity-50 @endguest @auth cursor-pointer active:text-gray-300 @endauth"
                           @guest tabindex="-1" @endguest>Products</a>

{{--                        <a href="{{route('productUser.index')}}"--}}
{{--                           class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white active:text-gray-300">Products</a>--}}


{{--                        <a href="{{route('category')}}"--}}
                        <a href="{{route('categoryforusers.index')}}"
                           class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white
   @guest cursor-not-allowed opacity-50 @endguest @auth cursor-pointer active:text-gray-300 @endauth"
                           @guest tabindex="-1" @endguest>Category</a>


                        <a href="#"
                           class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white active:text-gray-300">About</a>


                        <a href="#"
                           class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white active:text-gray-300">Contact
                            Us</a>

{{--                        <a href="#"--}}
{{--                           class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white--}}
{{--   @guest cursor-not-allowed opacity-50 @endguest @auth cursor-pointer active:text-gray-300 @endauth"--}}
{{--                           @guest tabindex="-1" @endguest>--}}
{{--                            Cheking--}}
{{--                        </a>--}}


                    </div>
                </div>


            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <button type="button"
                        class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">View notifications</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"/>
                    </svg>
                </button>

                <!-- Profile dropdown -->
                <div class="relative ml-3 flex items-center">
                    <div>
                        <button type="button"
                                class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            {{--                            <span class="absolute -inset-1.5"></span>--}}
                            <span class="sr-only">Open user menu</span>

                            @auth
                                <img class="size-8 rounded-full"
                                     src="{{ Auth::user()->profile_photo_url ?? 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80' }}"
                                     alt="User avatar">
                            @endauth
                        </button>


                        @guest
                            <a href="{{ route('register') }}"
                               class="hover:bg-gray-700 hover:text-gray-300 active:text-white text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
                            <a href="{{ route('login') }}"
                               class="hover:bg-gray-700 hover:text-gray-300 active:text-white text-white px-3 py-2 rounded-md text-sm font-medium">Log
                                in</a>
                        @endguest
                    </div>


                    @auth
                        <div class="ml-3">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="hover:bg-gray-700 hover:text-gray-300 active:text-white text-white px-3 py-2 rounded-md text-sm font-medium">Log out</button>
                            </form>
                        </div>
                    @endauth

                    @auth

                        @if(auth()->user()->isAdmin())
                            <div class="ml-3">
                                <form method="GET" action="{{ route('admin.dashboard') }}">
                                    @csrf
                                    <button class="hover:bg-gray-700 hover:text-gray-300 active:text-white text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</button>
                                </form>
                            </div>
                        @endif
                    @endauth


                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
{{--    <div class="sm:hidden" id="mobile-menu">--}}
{{--        <div class="space-y-1 px-2 pb-3 pt-2">--}}
{{--            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->--}}
{{--            <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"--}}
{{--               aria-current="page">Dashboard</a>--}}
{{--            <a href="#"--}}
{{--               class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>--}}
{{--            <a href="#"--}}
{{--               class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>--}}
{{--            <a href="#"--}}
{{--               class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>--}}
{{--        </div>--}}
{{--    </div>--}}
</nav>
