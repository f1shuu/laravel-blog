<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log in</h1>
                <form method="POST" action="/sessions" class="mt-10">
                    @csrf

                    <x-form.input name="email" input="email" type="email" autocomplete="username"/>
                    <x-form.input name="password" input="password" type="password" autocomplete="password"/>

                    <div>
                        <x-form.button>Log in</x-form.button>
                        <p class="text-xs flex justify-end">Not having an account yet?&nbsp;<a href="/register"
                                                                                               class="underline">Create
                                one.</a></p>
                    </div>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
