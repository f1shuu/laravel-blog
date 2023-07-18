<!doctype html>

<title>My Personal Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<style>
    html {
        background-color: #1e1e1e;
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">
            @auth
                @admin
                <x-dropdown>
                    <x-slot name="trigger">
                        <button
                            class="mr-5 text-white text-xs font-bold uppercase border border-gray-500 rounded-full px-3 py-3 hover:bg-gray-600">
                            Welcome, {{ auth()->user()->username }}!
                        </button>
                    </x-slot>

                    <x-dropdown-item href="admin/posts/create" :active="request()->is('admin/posts/create')">New post</x-dropdown-item>
                    <x-dropdown-item href="tags/create" :active="request()->is('admin/tags/create')">New tag</x-dropdown-item>
                    <x-dropdown-item href="tags" :active="request()->is('admin/tags')">View all tags</x-dropdown-item>
                    <x-dropdown-item href="admin/posts" :active="request()->is('admin/posts')">View all posts</x-dropdown-item>

                </x-dropdown>
            @else
                <a class="mr-5 text-white text-xs font-bold uppercase">Welcome, {{ auth()->user()->username }}!</a>
                @endadmin

                <form method="POST" action="/logout" class="font-semibold uppercase">
                    @csrf
                    <x-form.button type="submit">Log out</x-form.button>
                </form>
            @endauth
            @guest
                <a href="/login" class="text-white text-xs font-bold uppercase">Log in</a>
                <a href="/register"
                   class="flex items-end bg-blue-500 ml-5 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 hover:bg-blue-600">Register</a>
            @endguest
        </div>
    </nav>

    {{ $slot }}

</section>

<x-flash/>

</body>
