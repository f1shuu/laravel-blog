<x-layout>
    <x-setting heading="Create new tag">
        <form method="POST" action="/tags">
            @csrf

            <x-form.input name="name" input="name" type="text"/>
            <p class="text-xs mb-6">If you want the tag to have a color, simply name it using an existing color in English. Example: blue. The '#' will be added automatically.</p>

            <div>
                <x-form.button>Create</x-form.button>
            </div>
        </form>
    </x-setting>

</x-layout>
