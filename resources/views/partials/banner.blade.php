<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-center items-center">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                        Hello  {{ Auth::check() ? Auth::user()->name : 'Guest' }}
{{--            Hello Guest !--}}
        </h1>
    </div>
</header>