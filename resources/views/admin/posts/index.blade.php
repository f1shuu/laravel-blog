<x-layout>
    <x-setting heading="Manage posts">
        <div class="flex flex-col">
            <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            @if (count($posts) === 0)
                                <p class="px-2 py-2">No posts available to preview. Want to create one? <a href="/admin/posts/create" class="underline">Go here.</a></p>
                            @endif
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-semibold text-sm font-medium text-gray-900">
                                                <p>{{ $post->title }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/admin/posts/{{ $post->id }}/edit"
                                           class="text-green-500 hover:text-green-600 border border-green-500 px-5 py-2 rounded-xl">View</a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/admin/posts/{{ $post->id }}/edit"
                                           class="text-blue-500 hover:text-blue-600 border border-blue-500 px-5 py-2 rounded-xl">Edit</a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/admin/posts/{{ $post->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                onclick="return confirm('Are you sure you want to delete {{ $post->title }} post?')"
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
