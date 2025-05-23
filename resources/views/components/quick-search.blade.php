<div>
    <div class="flex items-end justify-between">
        <!-- Reset search button -->
        <div class="mr-4">
            @if(request()->search)
            <a href="{{ route($route) }}" class="inline-block mt-2 text-blue-500 hover:text-blue-700">Clear Search</a>
            @endif
        </div>

        <!-- Search form -->
        <form method="GET" action="{{ route($route) }}" class="flex-grow" oninput="this.form.submit()">
            <div>
                <label for="search" class="block text-sm/6 font-medium text-gray-900">Quick search</label>
                <div class="mt-2">
                    <div class="flex rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                        <input type="text" name="search" id="search" class="block min-w-0 grow px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6">
                        <div class="flex py-1.5 pr-1.5">
                            <kbd class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-xs text-gray-400">⌘K</kbd>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
