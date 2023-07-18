<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="bg-white max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10 rounded-xl px-5 py-5">
            <div class="col-span-4 lg:text-center lg:pt-14">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published
                    <time>{{ $post -> created_at -> diffForHumans() }}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="{{ asset('storage/' .$post->author->avatar) }}" width="60" class="rounded-xl">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">
                            <a href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                        </h5>
                        <h6>author</h6>
                    </div>
                </div>

                <div class="mt-4">
                    <x-category-button :category="$post -> category"/>
                </div>

            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                       class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>
                        Back to Posts
                    </a>

                    <div>
                        @foreach($post->tags as $tag)
                            <x-tag-button :tag="$tag" />
                        @endforeach
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">{{ $post -> title }}</h1>

                <div class="space-y-4 lg:text-lg leading-loose">{!! $post -> body !!}</div>

                <section class="col-span-8 col-start-5 mt-10 space-y-5">
                    @include ('posts._add-comment-form')
                    @foreach ($post->comments as $comment)
                        <x-post-comment :comment="$comment"/>
                    @endforeach
                </section>
        </article>
    </main>
</x-layout>
