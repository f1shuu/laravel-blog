<x-layout>
    <x-setting heading="Manage tags">
        <div class="flex flex-col">
            <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            @if (count($tags) === 0)
                                <p class="px-2 py-2">No tags available to preview. Want to create one? <a
                                        href="/admin/tags/create" class="underline">Go here.</a></p>
                            @endif
                            @foreach ($tags as $tag)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-{{ $tag->color }} font-semibold text-sm font-medium text-gray-900">
                                                <a href="/?tags[]={{ $tag->slug }}">#{{ Str::lower($tag->name) }}</a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/tags/{{ $tag->slug }}">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                onclick="return confirm('Are you sure you want to delete #{{ Str::lower($tag->name) }} tag?')"
                                                type="submit"
                                                class="font-bold text-red-500 hover:text-red-600 border border-red-500 px-5 py-2 rounded-xl">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>
