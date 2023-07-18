<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)"/>
            <x-form.input name="slug" :value="old('slug', $post->slug)"/>

            <div class="mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)"/>
                </div>

                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl mb-6" width="100">
            </div>

            <x-form.textarea name="excerpt" required>{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body" required>{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required
                        class="rounded-xl px-2 py-1 border border-gray-400">
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>

            <x-form.field>
                <x-form.label name="tags"/>
                <select name="tag_id[]" id="tag_id" class="selectpicker rounded-xl px-2 py-1 border border-gray-400"
                        multiple data-live-search="true">
                    @foreach(\App\Models\Tag::all() as $tag)
                        <option
                            value="{{ $tag->id }}"
                            {{ old('tag_id', $post->tag_id) == $tag->id ? 'selected' : '' }}
                            class="text-{{ $tag->color }}"
                        >#{{ $tag->name }}</option>
                    @endforeach
                </select>

                <x-form.error name="tag_id"/>
            </x-form.field>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
