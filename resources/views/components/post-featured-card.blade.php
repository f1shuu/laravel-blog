@props(['post'])

<article
    class="bg-white transition-colors duration-100 hover:bg-gray-300 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="rounded-xl py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" class="rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="flex justify-between space-x-2">
                    <x-category-button :category="$post->category"/>

                    <div>
                        @foreach($post->tags as $tag)
                            <x-tag-button :tag="$tag"/>
                        @endforeach
                    </div>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{ $post -> slug }}">{{ $post -> title }}</a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post -> created_at -> diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2 space-y-4">
                {!! $post -> excerpt !!}
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="{{ asset('storage/' .$post->author->avatar) }}"
                         width="60"
                         class="rounded-xl">
                    <div class="ml-3">
                        <h5 class="font-bold">{{ $post -> author -> name }}</h5>
                        <h6>author</h6>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/posts/{{$post -> slug}}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-400 hover:bg-gray-500 rounded-full py-2 px-8"
                    >Read more</a>
                </div>
            </footer>
        </div>
    </div>
</article>
