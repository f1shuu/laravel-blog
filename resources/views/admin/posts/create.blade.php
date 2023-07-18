<x-layout>
    <x-setting heading="Publish new post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title"/>
            <x-form.input name="slug"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.textarea name="excerpt"/>
            <x-form.textarea name="body"/>

            <x-form.field>
                <x-form.label name="category" />
                <select name="category_id" id="category_id" class="rounded-xl px-2 py-1 border border-gray-400">
                    @foreach(\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category" />
            </x-form.field>

            <x-form.field>
                <x-form.label name="tags" />
                <select name="tag_id[]" id="tag_id" class="selectpicker rounded-xl px-2 py-1 border border-gray-400" multiple data-live-search="true">
                    @foreach(\App\Models\Tag::all() as $tag)
                        <option
                            value="{{ $tag->id }}"
                            {{ old('tag_id') == $tag->id ? 'selected' : '' }}
                            class="text-{{ $tag->color }}"
                        >#{{ Str::lower($tag->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="tag_id" />
            </x-form.field>

            <p class="text-xs mb-6">Use Ctrl/Cmd + click to select multiple tags at once.</p>
            <div>
                <x-form.button>Publish</x-form.button>
            </div>
        </form>
    </x-setting>

</x-layout>
