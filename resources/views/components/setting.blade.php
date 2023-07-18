@props(['heading'])

<section class="py-8 max-w-4 mx-auto">
    <h1 class="text-white text-lg font-bold mb-8 pb-2 border-b">{{ $heading }}</h1>

    <div class="flex">
        <aside class="w-48">
            <h2 class="text-white font-semibold uppercase pb-2 border-b mb-4">Links</h2>
            <ul>
                <li class="mb-3">
                    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : 'text-white' }}">New post</a>
                </li>
                <li class="mb-3">
                    <a href="/tags/create" class="{{ request()->is('tags/create') ? 'text-blue-500' : 'text-white' }}">New tag</a>
                </li>
                <li class="mb-3">
                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : 'text-white' }}">All posts</a>
                </li>
                <li class="mb-3">
                    <a href="/tags" class="{{ request()->is('tags') ? 'text-blue-500' : 'text-white' }}">All tags</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1 bg-gray-100 rounded-xl">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
