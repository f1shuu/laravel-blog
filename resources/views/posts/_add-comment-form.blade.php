@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf
            <header class="flex items-center border-b border-gray-400">
                <img src="{{ asset('storage/' .$post->author->avatar) }}" width="60"
                     height="60"
                     class="rounded-t-xl">
                <h2 class="ml-5 font-bold">Add a comment</h2>
            </header>

            <div class="mt-6">
                                <textarea
                                    name="body"
                                    class="w-full border border-gray-400 px-1 py-1 rounded-xl focus:outline-none focus:ring"
                                    rows="3"
                                    placeholder="What are your thoughts?"
                                    required></textarea>
                @error('body')
                <span class="text-xd text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-4">
                <x-form.button>Post</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p>
        <a href="/login"
           class="bg-blue-500 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 hover:bg-blue-600">Log
            in to post a comment</a>
    </p>
@endauth
