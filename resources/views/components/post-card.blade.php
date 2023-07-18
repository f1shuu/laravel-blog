@props(['post'])

<article
    {{ $attributes -> merge(['class' => "mb-6 ml-3 bg-white transition-colors duration-100 hover:bg-gray-300 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl"]) }}>
    <div class="py-6 px-5">
        <div>
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="flex justify-between space-x-2">
                    <x-category-button :category="$post->category"/>

                    <div>
                        @foreach($post->tags as $tag)
                            <x-tag-button :tag="$tag"/>
                        @endforeach
                    </div>
                </div>

                <div class="mt-4">
                    <div class="mt-4">
                        <h1 class="text-3xl">{{ $post -> title }}</h1>

                        <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post -> created_at -> diffForHumans() }}</time>
                    </span>
                    </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                {!! $post -> excerpt !!}
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="{{ asset('storage/' .$post->author->avatar) }}"
                         width="60"
                         class="rounded-xl">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="/authors/ {{ $post->author->username }}">{{ $post -> author -> name }}</a></h5>
                        <h6>author</h6>
                    </div>
                </div>

                <div>
                    <a href="/posts/{{ $post -> slug }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-400 hover:bg-gray-500 rounded-full py-2 px-8"
                    >Read more</a>
                </div>
            </footer>
        </div>
    </div>
</article>
