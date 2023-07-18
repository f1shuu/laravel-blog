<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-white text-4xl">
        My <span class="text-blue-500">Personal</span> Blog
    </h1>

    <div class="space-y-2 lg:space-x-2 mt-4">
        <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
            <x-category-dropdown/>
        </div>

        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-2 py-2">
            <form method="GET" action="/">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                <input type="text"
                       name="search"
                       placeholder="Find something..."
                       class="bg-transparent font-semibold text-sm rounded-xl px-1 py-1"
                       value="{{ request('search') }}">

                <button type="submit"
                        class="relative flex lg:inline-flex items-center bg-blue-500 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 hover:bg-blue-600"
                >Search
                </button>
            </form>
        </div>

    </div>
</header>
