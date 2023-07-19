<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Join now</h1>
            <form method="POST" action="/register" class="mt-10" enctype="multipart/form-data">
                @csrf
                <x-form.input name="name" type="text"/>
                <x-form.input name="username" type="text"/>
                <x-form.input name="email" type="email" autocomplete="username"/>
                <x-form.input name="avatar" type="file"/>
                <x-form.input name="password" type="password" autocomplete="password"/>
                <x-form.input name="password_confirmation" type="password" autocomplete="password"/>

                <x-form.button>Join!</x-form.button>
            </form>
        </main>
    </section>
</x-layout>
